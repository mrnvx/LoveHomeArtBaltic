<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        // Получаем товары, добавленные текущим авторизованным пользователем
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        return view('cart.index', compact('cartItems'));
    }

    /**
     * Добавление продукта в корзину.
     */
    public function store(Request $request)
{
    
    // Валидация входящих данных
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id', // Проверка, что продукт существует
        'quantity' => 'required|integer|min:1',       // Проверка количества
    ]);

    // Проверяем авторизацию пользователя
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to add products to the cart.');
    }

    // Проверяем, существует ли уже запись для этого продукта в корзине
    $cartItem = Cart::where('user_id', auth()->id())
                    ->where('product_id', $validated['product_id'])
                    ->first();

    if ($cartItem) {
        // Если продукт уже есть в корзине, обновляем количество
        $cartItem->update([
            'quantity' => $cartItem->quantity + $validated['quantity'],
        ]);
    } else {
        // Если продукта нет, добавляем его в корзину
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Product added to cart!');
}

    /**
     * Удаление продукта из корзины.
     */
    public function destroy($id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->findOrFail($id); // Удаляем только из корзины текущего пользователя
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

}
