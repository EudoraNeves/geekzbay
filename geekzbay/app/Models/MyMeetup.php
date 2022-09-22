<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyMeetup extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'meetup_id',
        'status',
    ];
}
