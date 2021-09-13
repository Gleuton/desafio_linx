<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Categories extends Model
{
    public $guarded = [];
    public $timestamps = [];
    protected $hidden = ['id','products_id'];

    public function Parents(): HasMany
    {
        return $this->hasMany(CategoriesParents::class);
    }

    public function Product(): HasOne
    {
        return $this->hasOne(Products::class);
    }
}
