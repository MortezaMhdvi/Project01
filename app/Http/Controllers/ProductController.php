<?php

namespace App\Http\Controllers;

use App\BuildPhase;
use App\Label;
use App\Machine;
use App\PhaseProfile;
use App\Product;
use App\ProductDetails;
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
        $build_phase = BuildPhase::all();
        $machine = Machine::all();
        $label = Label::all();
        return view('products.create', compact('phase_profile', 'build_phase', 'machine', 'label'));
    }

    public function getPhase($id)
    {
        $phase_profile = PhaseProfile::query()->where('id', $id)->first();
        $build_phase = $phase_profile->buildPhase;
        return response()->json([
            'phases' => $build_phase
        ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
//        foreach($request->input('tabs') as $phaseId => $tabData){
//            echo ($phaseId);
//        }

        $product = new Product();
        $product->title = $request->input('title');
        $product->code = $request->input('code');
        $product->phase_profile_id = $request->input('phase_profile_id');
        $product->save();

        foreach ($request->input('tabs') as $phaseId => $item) {
            if ($item['enable'] == 'on') {
                $enable = !empty($item['enable']) ? 1 : 0;
                $product_details = new ProductDetails();
                $product_details->product_id = $product->id;
                $product_details->label_id = $item['label'];
                $product_details->phase_id = $phaseId;
                $product_details->machine = json_encode($item['machine']);
                $product_details->enable = $enable;
                $product_details->save();
            }
        }
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $phase_profile = PhaseProfile::all();
        $build_phase = BuildPhase::all();
        $machine = Machine::all();
        $label = Label::all();
        $product_details = $product->product_details;
//        dd($product_details);
        return view('products.edit', compact('product', 'phase_profile', 'build_phase', 'machine', 'label', 'product_details'));
    }

    public function update(Request $request, Product $product)
    {
        dd($request->all());
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
