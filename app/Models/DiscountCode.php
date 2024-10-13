<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function outerOrder()
    {
        return $this->belongsToMany(OuterOrder::class);
    }

    public function internalOrder()
    {
        return $this->belongsToMany(InternalOrder::class);
    }
}
