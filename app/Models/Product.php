<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    public function seller()
    {
        return $this->belongsTo(User::class);
    }
}
