<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    public $timestamps = [];
    protected $guarded = ['id'];
    protected $hidden = ['id'];
    protected $casts = [
        'count' => 'integer',
        'price' => 'double'
    ];
}