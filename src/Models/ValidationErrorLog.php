<?php

namespace IcarusMedia\ValidationErrorLogger\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $method
 * @property array<string, mixed> $request
 * @property string $response
 * @property string $url
 */
class ValidationErrorLog extends Model
{
    use HasFactory;

    protected $casts = [
        'request' => 'array',
    ];
}
