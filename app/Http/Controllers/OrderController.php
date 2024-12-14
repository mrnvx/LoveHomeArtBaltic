<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::with('user')->latest()->get();
    return view('admin.orders.index', compact('orders'));
}

    public function userOrders()
{
    $orders = Order::where('user_id', auth()->id())->with('items.product')->get();
    return view('orders', compact('orders'));
}

public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}

}
