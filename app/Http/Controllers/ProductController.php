<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = DB::table('products')->select('id', 'modelNumber', 'type')->get();

        return view('product/index', ['data' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'modelNumber' => $request->model,
            'type' => $request->type,
        ]);

        $product->save();

        $detail = new ProductDetail();

        $detail->img_link = $request->image;

        $nlName = $request->pdfNL->getClientOriginalname();
        $detail->pdf_nl = $nlName;
        $file = $request->file('pdfNL')->storeAs('pdf', $nlName);

        $enName = $request->pdfEN->getClientOriginalname();
        $detail->pdf_en = $enName;
        $file = $request->file('pdfEN')->storeAs('pdf', $enName);


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
        //TODO create a product page where the user will be redirected to when they click on the product in the datatable
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
        //TODO create a simple delete for a given product, this will delete all associated data and files
    }
}
