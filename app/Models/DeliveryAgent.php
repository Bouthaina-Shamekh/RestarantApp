<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DeliveryAgent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    protected $guard = 'deliveryAgent';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'status',
        'age',
        'phone',
        'img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function outerOrder()
    {
        return $this->belongsToMany(OuterOrder::class);
    }

    public function location()
    {
        return $this->belongsToMany(Location::class);
    }
}
