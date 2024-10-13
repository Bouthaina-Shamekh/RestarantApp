<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuterOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function outerOrderDetail()
    {
        return $this->hasMany(OuterOrderDetail::class);
    }


    public function deliveryAgent()
    {
        return $this->belongsToMany(DeliveryAgent::class);
    }

    public function discountCode()
    {
        return $this->belongsToMany(DiscountCode::class);
    }
}
