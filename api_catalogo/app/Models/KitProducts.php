<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KitProducts extends Model
{
    protected $guarded = ['id'];
    public $timestamps = [];


    public function Product(): HasOne
    {
        return $this->hasOne(Products::class);
    }
}
