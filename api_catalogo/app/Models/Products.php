<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'clientLastUpdated';

    protected $keyType = 'string';
    protected $guarded = [];
    protected $casts = [
        'imagesSsl' => 'array',
        'specs' => 'array',
        'customBusiness' => 'array',
        'price' => 'double',
        'oldPrice' => 'double',
        'extraInfo' => 'array',
    ];

    public function Categories(): HasMany
    {
        return $this->hasMany(Categories::class);
    }

    public function Skus(): HasMany
    {
        return $this->hasMany(Skus::class);
    }

    public function Images(): HasMany
    {
        return $this->hasMany(Images::class)->orderBy('name');
    }

    public function Tags(): HasMany
    {
        return $this->hasMany(Tags::class);
    }

    public function Installments(): BelongsTo
    {
        return $this->belongsTo(Installments::class);
    }

    public function AuditInfo(): BelongsTo
    {
        return $this->belongsTo(AuditInfo::class);
    }

    public function KitProduct(): HasMany
    {
        return $this->hasMany(KitProducts::class);
    }
}
