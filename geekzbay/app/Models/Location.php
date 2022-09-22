<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profilePicture',
        'type',
        'desc',
        'homePage',
        'address_city',
        'address_road',
        'address_number',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'location_user');
    }

}
