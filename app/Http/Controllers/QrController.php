<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        //$prod references to the model_number

//        dd($request->selected);

        //Set the path and name for the ZIP file(Storage/app/QRExport/QRExport.zip)
        $path=storage_path('app/QRExport/');
//        dd($path);
        $zipFileName = 'QRExport.zip';

        //Call ZipArchive class
        $zip=new ZipArchive();

        //Create a ZIP file on the specified location
        $r = $zip->open($path.$zipFileName, ZipArchive::CREATE);
//        dd($r);
        try {
            //Put the selected files in the zip --- PUT LOOP HERE ---
//            foreach ($request->selected as $prod) {
            foreach (explode(',', $request->selected) as $prod) {
//            dd($prod);
                $r = $zip->addFile('../storage/app/product/' . $prod . '/' . $prod . '.svg', 'QRCodes/' . $prod . '.svg');
//            dd($r);
            }
        }
        catch(\Exception $e){
            Session::flash('errorToken', 'Selecteer minimaal 1 item');

            return redirect(route('qrList'));
        }

        //Close and save the zip file before it gets downloaded
        $r = $zip->close();

        //Implement download and delete function here
//        Session::flash('downloadToken', 'User has downloaded a zip file');
//        return redirect(route('qrList'));

        return response()->download($path . 'QRExport.zip', 'QRExport '. Now() .'.zip')->deleteFileAfterSend();


//        return redirect(Route('qrList'));
//        $zip->addFile(Storage::url('product/714.35/714.35.svg'));
    }

    public function downloadAll(){
        $table = DB::table('products')->select('model_number')->get();
//        dd($table);

        //Set the path and name for the ZIP file(Storage/app/QRExport/QRExport.zip)
        $path=storage_path('app/QRExport/');
        $zipFileName = 'QRExport.zip';

        //Call ZipArchive class
        $zip=new ZipArchive();

        //Create a ZIP file on the specified location
        $r = $zip->open($path.$zipFileName, ZipArchive::CREATE);
//        dd($r);
        try {
            //Put the selected files in the zip --- PUT LOOP HERE ---
            foreach ($table as $num) {
//            dd($prod);
                $r = $zip->addFile('../storage/app/product/' . $num->model_number . '/' . $num->model_number . '.svg', 'QRCodes/' . $num->model_number . '.svg');
//            dd($r);
            }
        }
        catch(\Exception $e){
            Session::flash('errorToken', 'Selecteer minimaal 1 item');

            return redirect(route('qrList'));
        }

        //Close and save the zip file before it gets downloaded
        $r = $zip->close();

        //Implement download and delete function here
//        Session::flash('downloadToken', 'User has downloaded a zip file');
//        return redirect(route('qrList'));

        return response()->download($path . 'QRExport.zip', 'QRExport '. Now() .'.zip')->deleteFileAfterSend();
    }
}
