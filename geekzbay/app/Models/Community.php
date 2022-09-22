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

    public function users(){
        return $this->belongsToMany(User::class, 'users_in_communities', 'community_id', 'user_id');
    }
}
