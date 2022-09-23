<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInMeetups extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'meetup_id',
      'status'
    ];

    public function users() {
        return $this->hasMany(Users::class);
    }

    public function meetups() {
        return $this->hasMany(Meetup::class);
    }
}
