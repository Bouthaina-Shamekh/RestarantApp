<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function outerOrderDetail()
    {
        return $this->hasMany(OuterOrderDetail::class);
    }

    public function internalOrderDetail()
    {
        return $this->hasMany(InternalOrderDetail::class);
    }

    public function favoriteProduct()
    {
        return $this->hasMany(Favorite_Product::class);
    }
}
