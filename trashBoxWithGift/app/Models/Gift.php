<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    public function giftOrder() {
        return $this->hasMany(\App\Models\GiftOrder::class);
    }

    protected $fillable = [
        'name',
        'price',
        'imagePath',
        'description',
        'count',
    ];
}
