<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    public $timestamps = false;
    

    protected $fillable = [
        'photo',
        'name',
        'discordLink',
        'category_id',
    ];

    public function priceWithEuro(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['price'] .
        );
    }
}
