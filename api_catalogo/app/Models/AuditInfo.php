<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditInfo extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    public function Product():HasOne
    {
        return $this->hasOne(Products::class);
    }
}
