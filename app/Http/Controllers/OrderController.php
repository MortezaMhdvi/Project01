<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderContent;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        return view('orders.index', compact('order'));
    }

    public function create()
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('orders.create', compact('product', 'customer'));
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        $order->title = $request->input('title');
        $order->code = $request->input('code');
        $order->value = $request->input('value');
        $order->date = $request->input('date');
        $order->save();

        $orderContent = json_decode($request->input('hidden'));

        foreach ($orderContent as $item) {
            $order_content = new OrderContent();
            $order_content->order_id = $order->id;
            $order_content->product_id = $item->product_id;
            $order_content->title = $item->title;
            $order_content->value = $item->value;
            $order_content->save();
        }
        return redirect()->route('order.index');
    }
}
