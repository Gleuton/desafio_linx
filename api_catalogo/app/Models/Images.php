<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    public $incrementing = false;
    public $guarded = [];
    public $timestamps = [];

    public function Product(): HasOne
    {
        return $this->hasOne(Products::class);
    }
}
