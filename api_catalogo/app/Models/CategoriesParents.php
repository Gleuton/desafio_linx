<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesParents extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    public function Categories(): HasMany
    {
        return $this->hasMany(Categories::class);
    }
}
