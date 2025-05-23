<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category_id', 'discount'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
{
    return $this->hasMany(Review::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}


}
