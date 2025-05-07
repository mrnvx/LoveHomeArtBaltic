<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'vel',
            'description' => 'Testa driftwood pardosana',
            'price' => 20.16,
            'image' => 'images/drift.png',
            'category_id' => 1, 
        ]);
    }
}
