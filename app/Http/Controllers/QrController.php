<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
//use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use File;
use ZipArchive;

class QrController extends Controller
{
    public function index()
    {
        $table = DB::table('products')->join('product_details', 'products.id', '=', 'product_details.product_id')->select('products.id', 'model_name', 'model_number', 'model_type', 'qr_link')->get();
//        dd($table);
        return view('qr/index', ['data' => $table]);
    }

    public function download(Request $request)
    {
        //Write the download function here. All selected items must be put into an array, after which the array is looped through.
        //In this loop it will grab the desired QR code files and put them in a ZIP File, which is then given to the user.

//        dd($request->selected);


        return redirect(Route('qrList'));
    }
}
