<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function giftOrder() {
        return $this->hasMany(\App\Models\GiftOrder::class);
    }

    protected $fillable = [
        'id',
        'user_id',
    ];
}
