<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        return view('cart.index', compact('cartItems'));
    }

    
    public function store(Request $request)
{
    
    
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id', 
        'quantity' => 'required|integer|min:1',       
    ]);

    
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to add products to the cart.');
    }

    // parbauda vai ir jau groza
    $cartItem = Cart::where('user_id', auth()->id())
                    ->where('product_id', $validated['product_id'])
                    ->first();

    if ($cartItem) {
        // ja ir pieliek klat 
        $cartItem->update([
            'quantity' => $cartItem->quantity + $validated['quantity'],
        ]);
    } else {
        
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Product added to cart!');
}

  
    public function destroy($id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->findOrFail($id); 
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

}
