<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function saggestion()
    {
        return $this->hasMany(Saggestion::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function outerOrder()
    {
        return $this->hasMany(OuterOrder::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function internalOrder()
    {
        return $this->hasMany(InternalOrder::class);
    }

    public function favoriteProduct()
    {
        return $this->hasMany(Favorite_Product::class);
    }





}
