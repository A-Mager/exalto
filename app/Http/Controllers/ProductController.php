<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

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

        $product->save();

        $detail = new ProductDetail();

        $detail->img_link = $request->image;

        $nlName = $request->pdfNL->getClientOriginalname();
        $detail->pdf_nl = $nlName;
        $file = $request->file('pdfNL')->storeAs('pdf/'.$product->model_number, $nlName);

        $enName = $request->pdfEN->getClientOriginalname();
        $detail->pdf_en = $enName;
        $file = $request->file('pdfEN')->storeAs('pdf/'.$product->model_number, $enName);


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
        //TODO create a editing form when the admin wants to edit a product page
        $name = Product::find($id);
        $detail = ProductDetail::where('product_id', $id)->first();

        $path_nl = Storage::url('pdf/'.$name->model_number.'/'.$detail->pdf_nl);
        $path_en = Storage::url('pdf/'.$name->model_number.'/'.$detail->pdf_en);

        return view('product/show', ['name' => $name, 'detail' => $detail, 'path_nl' => $path_nl, 'path_en' => $path_en]);
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
        //TODO create a PUT method so the product page gets updated
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
        Storage::deleteDirectory('pdf/'.$product->model_number);
        $product->delete();
        return redirect('/');
    }

    public function download($id, $file){
        return Storage::download('pdf/'.$id.'/'.$file);
    }
}
