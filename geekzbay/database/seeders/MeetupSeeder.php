<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Meetup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetups')->insert(
            [
                
                'name' => 'LGX',
                'date' => '26.09.22',
                'desc' => 'Luxembourg Gamer Experience',
                'eventadmin_id' => 1,
                'community_id' => 1,
                'place_id' => 1,
                'alt_address_city' => 'Kirchberg',
                'alt_address_street' => 'rue du Kirchberg',
                'alt_address_number' => '147',
                'created_at' => '22.09.22',
                'updated_at' => '22.09.22',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Gamers forever',
                'date' => '25.09.22',
                'desc' => 'Gamers meetup',
                'eventadmin_id' => 2,
                'community_id' => 2,
                'place_id' => 2,
                'alt_address_city' => 'Kirchberg',
                'alt_address_street' => 'rue du Kirchberg',
                'alt_address_number' => '47',
                'created_at' => '22.09.22',
                'updated_at' => '22.09.22',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Card gamers',
                'date' => '25.09.22',
                'desc' => 'Luxembourg Card Experience',
                'eventadmin_id' => 3,
                'community_id' => 3,
                'place_id' => 3,
                'alt_address_city' => 'Kirchberg',
                'alt_address_street' => ' Kirchberg',
                'alt_address_number' => '17',
                'created_at' => '22.09.22',
                'updated_at' => '22.09.22',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Luxembourg board games',
                'date' => '27.09.22',
                'desc' => 'Gamer Experience',
                'eventadmin_id' => 4,
                'community_id' => 4,
                'place_id' => 4,
                'alt_address_city' => 'Kirchberg',
                'alt_address_street' => 'rue du Kirchberg',
                'alt_address_number' => '147',
                'created_at' => '22.09.22',
                'updated_at' => '22.09.22',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Luxembourg online games forever',
                'date' => '26.09.22',
                'desc' => 'Luxembourg Game online this is just a test',
                'eventadmin_id' => 5,
                'community_id' => 5,
                'place_id' => 5,
                'alt_address_city' => 'Esch',
                'alt_address_street' => 'place Kirchberg',
                'alt_address_number' => '484',
                'created_at' => '22.09.22',
                'updated_at' => '22.09.22',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Gameboys advanced done',
                'date' => '26.09.22',
                'desc' => 'Esch sur Alzette',
                'eventadmin_id' => 6,
                'community_id' => 6,
                'place_id' => 6,
                'alt_address_city' => 'Kirchberg',
                'alt_address_street' => 'rue du Kirchberg',
                'alt_address_number' => '147',
                'created_at' => '22.09.22',
                'updated_at' => '22.09.22',
            ]
        );
    }
}