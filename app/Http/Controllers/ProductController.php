<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('shop.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('name', 'LIKE', "%{$query}%") 
                        ->orWhere('description', 'LIKE', "%{$query}%") 
                        ->get();

    return view('shop.search', compact('products', 'query'));
}
}
