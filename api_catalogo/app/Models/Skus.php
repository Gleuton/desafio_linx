<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skus extends Model
{
    protected $table = 'skus';
    public $incrementing = false;
    protected $primaryKey = 'sku';
    public $keyType = 'string';
    protected $guarded = [];
    public $timestamps = [];


    public function Product(): HasOne
    {
        return $this->hasOne(Products::class);
    }
}
