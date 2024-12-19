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

    public function store(Request $request)
    {
        $barcode = new Barcode();
        $barcode->title = $request->input('title');
        $barcode->prefix = $request->input('prefix');
        $barcode->type = $request->input('type');
        $barcode->save();
        foreach ($request->input("barcode_details") as $item) {
            $barcode->barcode_details()->attach($item["barcode_detail_id"], ['order' => $item["order"]]);
        }

    }

    public function edit(Barcode $barcode)
    {

        $barcodeDetails = $barcode->barcode_details;
        $details = BarcodeDetails::all();
//        dump($barcodeDetails);
        return view('barcodes.edit', compact('barcode', 'barcodeDetails','details'));
    }

}
