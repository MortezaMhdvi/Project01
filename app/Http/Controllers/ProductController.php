<?php

namespace App\Http\Controllers;

use App\PhaseProfile;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('products.index', compact('product'));
    }

    public function create()
    {
        $phase_profile = PhaseProfile::all();
        return view('products.create', compact('phase_profile'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->input('title');
        $product->code = $request->input('code');
        $product->phase_profile_id = $request->input('phase_profile_id');
        $product->save();
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $phase_profile = PhaseProfile::all();
        return view('products.edit', compact('product', 'phase_profile'));
    }

    public function update(Request $request, Product $product)
    {
        $product->title = $request->input('title');
        $product->code = $request->input('code');
        $product->phase_profile_id = $request->input('phase_profile_id');
        $product->save();
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
