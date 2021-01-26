<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'fuel',
        'km',
        'tank',
        'prize',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
