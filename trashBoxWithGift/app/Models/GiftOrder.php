<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftOrder extends Model
{
    public function orders() {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function gifts() {
        return $this->belongsTo(\App\Models\Gift::class);
    }

    protected $fillable = [
        'order_id',
        'gift_id',
        'quantity'
    ];
}
