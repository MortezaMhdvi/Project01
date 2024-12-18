<?php

namespace App\Http\Controllers;

use App\Barcode;
use App\BarcodeDetails;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        $barcode = Barcode::all();
        return view('barcodes.index', compact('barcode'));
    }

    public function create()
    {
        $barcodeDetails = BarcodeDetails::all();
        return view('barcodes.create', compact('barcodeDetails'));
    }
    public function store(Request $request){
        dd($request->all());
        $barcode = new Barcode();
        $barcode->title = $request->input('title');
        $barcode->prefix = $request->input('prefix');
        $barcode->type = $request->input('type');
        $barcode->save();
        $barcode->barcode_details()->attach($request->input('barcode_details'),['order'=>$request->input('order')]);
    }

}
