<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriesParents extends Model
{
    public $guarded = [];
    public $timestamps = [];
    protected $hidden = ['id','products_id'];

    public function Categories(): HasMany
    {
        return $this->hasMany(Categories::class);
    }
}
