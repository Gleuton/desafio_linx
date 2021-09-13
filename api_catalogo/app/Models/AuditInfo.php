<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AuditInfo extends Model
{
    protected $guarded = ['id'];
    protected $table = 'audit_info';
    public $timestamps = [];

    public function Product():HasMany
    {
        return $this->hasMany(Products::class);
    }
}
