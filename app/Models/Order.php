<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone',
        'address', 'city', 'state', 'zip',
        'subtotal', 'shipping', 'total',
        'status', 'payment_status', 'number', 'coupon_code', 'discount', 'tracking_number', 'tracking_url', 'shipped_at', 'delivered_at'
    ];

    protected $casts = ['shipped_at'=>'datetime', 'delivered_at'=>'datetime'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
