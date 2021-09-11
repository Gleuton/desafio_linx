<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Images extends Model
{
    public $guarded = [];
    public $timestamps = [];

    public function Product(): HasOne
    {
        return $this->hasOne(Products::class);
    }
}
