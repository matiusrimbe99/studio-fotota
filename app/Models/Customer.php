<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'address',
        'image',
        'nomor_hp',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get:fn($image) => asset('/image/customers/' . $image),
        );
    }
}
