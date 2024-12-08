<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        Review::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted!');
    }
}

