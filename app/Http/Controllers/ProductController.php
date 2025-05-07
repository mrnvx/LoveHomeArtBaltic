<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
     $categories = Category::all();

    $query = Product::query();

    if ($request->has('category')) {
        $query->where('category_id', $request->category);
    }
    if ($request->filled('price_min')) {
        $query->where('price', '>=', $request->price_min);
    }

    if ($request->filled('price_max')) {
        $query->where('price', '<=', $request->price_max);
    }

    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
        }
    }

    $products = $query->paginate(12);

    return view('shop.index', compact('products', 'categories'));
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

public function filterByCategory($id)
{
    $category = Category::findOrFail($id);
    $products = Product::where('category_id', $id)->paginate(12);
    $categories = Category::all();

    return view('shop.index', compact('products','categories', 'category'));
}
}
