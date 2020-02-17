<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = DB::table('products')->select('id', 'model_number', 'type')->get();

        return view('product/index', ['data' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product([
            'model_number' => $request->model,
            'type' => $request->type,
        ]);

        $detail = new ProductDetail();

        //Generate the QR code
        Storage::put('product/'.$request->model.'/'.$request->model.'.svg', \QrCode::generate('Hier komt de link naar de desbetreffende product pagina. Deze QR code zou dus lijden naar:'.$request->model));
        $detail->qrlink = $request->model.'.svg';

        //Save the uploaded files
        $nlName = $request->pdfNL->getClientOriginalname();
        $detail->pdf_nl = $nlName;
        $file = $request->file('pdfNL')->storeAs('product/'.$product->model_number, $nlName);

        $enName = $request->pdfEN->getClientOriginalname();
        $detail->pdf_en = $enName;
        $file = $request->file('pdfEN')->storeAs('product/'.$product->model_number, $enName);

        //Save everything in the DB
        $product->save();
        $product->detail()->save($detail);


        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $name = Product::find($id);
        $detail = ProductDetail::where('product_id', $id)->first();


        return view('product/show', ['name' => $name, 'detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $name = Product::find($id);
        $detail = ProductDetail::where('product_id', $id)->first();

        $path_nl = Storage::url('product/'.$name->model_number.'/'.$detail->pdf_nl);
        $path_en = Storage::url('product/'.$name->model_number.'/'.$detail->pdf_en);

        return view('product/edit', ['name' => $name, 'detail' => $detail, 'path_nl' => $path_nl, 'path_en' => $path_en]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Save type if changed
        $name = Product::find($id);
        $name->type = $request->type;
        $name->save();

        $detail = ProductDetail::where('product_id', $id)->first();

        if($request->pdfNL !== null){
            //Delete existing file from storage
            Storage::delete('pdf/'.$name->model_number.'/'.$detail->pdf_nl);

            $nlName = $request->pdfNL->getClientOriginalname();
            $detail->pdf_nl = $nlName;
            $file = $request->file('pdfNL')->storeAs('product/'.$name->model_number, $nlName);
            $name->detail()->save($detail);
        }

        if($request->pdfEN !== null){
            //Delete existing file from storage
            Storage::delete('product/'.$name->model_number.'/'.$detail->pdf_en);

            $enName = $request->pdfEN->getClientOriginalname();
            $detail->pdf_en = $enName;
            $file = $request->file('pdfEN')->storeAs('product/'.$name->model_number, $enName);
            $name->detail()->save($detail);
        }

        return redirect()->route('show', ['id' => $id,'name' => $name, 'detail' => $detail]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::deleteDirectory('product/'.$product->model_number);
        $product->delete();
        return redirect('/');
    }

    /**
     *  Download the specified file from the storage.
     *
     * @param $id
     * @param $file
     * @return mixed
     */
    public function download($id, $file){
        return Storage::download('product/'.$id.'/'.$file);
    }

    /**
     * QR-Code generator method
     */
    public function qrgen(){
        Storage::put('QR/yeet.svg', \QrCode::generate('The greatest of them all'));

        return redirect()->route('index');
    }

}
