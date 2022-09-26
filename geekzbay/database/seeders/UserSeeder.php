<?php

namespace Database\Seeders;

use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(5)->create();
        DB::table('users')->insert([
            'name' => 'Hai Na Zheng',
            'password' => Hash::make('88888888'),
            'email' => 'hai.na.zheng@icloud.com',
            'desc'=>'Life is beautiful'
        ]);
    }
}
