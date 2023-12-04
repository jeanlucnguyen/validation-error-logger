<?php

namespace IcarusMedia\ValidationErrorLogger\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidationErrorLog extends Model
{
    use HasFactory;

    protected $casts = [
        'request' => 'array',
    ];
}
