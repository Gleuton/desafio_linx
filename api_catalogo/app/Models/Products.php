<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'clientLastUpdated';

    public $incrementing = false;

    public function Categories(): HasMany
    {
        return $this->hasMany(Categories::class);
    }

    public function Images(): HasMany
    {
        return $this->hasMany(Images::class);
    }

    public function Installment(): HasOne
    {
        return $this->hasOne(Installments::class);
    }
}
