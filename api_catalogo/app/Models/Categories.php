<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    public function Parents(): HasMany
    {
        return $this->hasMany(CategoriesParents::class);
    }

    public function Product():HasOne
    {
        return $this->hasOne(Products::class);
    }
}