<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'clientLastUpdated';

    protected $keyType = 'string';
    protected $guarded = [];

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

    /**
     * @throws \Exception
     */
    public function setImagesSslAttribute($value): void
    {
        $this->attributes['imagesSsl'] = json_encode(
            $value,
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * @throws \Exception
     */
    public function setSpecsAttribute($value): void
    {
        $this->attributes['specs'] = json_encode(
            $value,
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * @throws \Exception
     */
    public function setExtraInfoAttribute($value): void
    {
        $this->attributes['extraInfo'] = json_encode(
            $value,
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * @throws \Exception
     */
    public function setCustomBusinessAttribute($value): void
    {
        $this->attributes['customBusiness'] = json_encode(
            $value,
            JSON_THROW_ON_ERROR
        );
    }
}
