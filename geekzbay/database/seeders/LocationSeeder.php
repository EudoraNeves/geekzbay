<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locations')->insert(
            [
                'name' => 'Respawn Bar',
                'profilePicture' => '',
                'type' => 'Bar',
                'desc' => 'The Respawn bar is situated in the center of Luxembourg and prides itself on being the first e-sport and gaming bar in Luxembourg. 400 square meters dedicated to gaming in multiple spaces. Come enjoy a drink with friends or colleagues while playing.',
                'homePage' => 'https://respawn.lu/',
                'address_city' => 'Luxembourg',
                'address_road' => 'Rue du Fort Neippeg',
                'address_number' => '65'
            ]
        );
    }
}
