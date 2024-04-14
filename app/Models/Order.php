<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'payment',
        'price',
        'product_code',
        'description',
        'user_id',
        'address',
        'phone'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
