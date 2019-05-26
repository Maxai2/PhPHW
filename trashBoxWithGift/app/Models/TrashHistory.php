<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class TrashHistory extends Model
{
    use SpatialTrait;

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    protected $fillable = [
        'id',
        'priceByCoin',
        'user_id'
    ];

    protected $spatialFields = [
        'geoLocation',
    ];
}
