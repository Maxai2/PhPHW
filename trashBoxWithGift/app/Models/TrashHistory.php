<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrashHistory extends Model
{
    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    protected $fillable = [
        'user_id',
        'gift_id',
        'quantity'
    ];
}
