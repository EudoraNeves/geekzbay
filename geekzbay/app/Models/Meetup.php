<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'desc',
        'eventadmin_id',
        'coomunity_id',
        'location_id',
        'alt_address_city',
        'alt_address_street',
        'alt_address_number',
    ];

    protected $casts = [
        'date' => 'datetime:l, d.n.Y'
    ];
}
