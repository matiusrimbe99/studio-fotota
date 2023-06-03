<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = [
        'studio_name',
        'description',
        'price',
        'image',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get:fn($image) => asset('/image/studios/' . $image),
        );
    }
}
