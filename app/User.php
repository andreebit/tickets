<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function getTotalCartItemsAttribute()
    {
        $carts = $this->carts()->get();

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->quantity;
        }

        return $total;
    }

    public function getTotalCartAmountAttribute()
    {
        $carts = $this->carts()->get();

        $total = 0;
        foreach ($carts as $cart) {
            $total += ($cart->price->value * $cart->quantity);
        }

        return $total;
    }

    public function getCartDescriptionAttribute()
    {
        $carts = $this->carts()->get();

        $description = $this->name . ': - ';
        foreach ($carts as $cart) {
            $description .= ($cart->price->description . ' - ');
        }

        return $description;
    }

}
