<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Meetupsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creating Fake data for the database

        DB::table('meetups')->insert(
            [
                'name' => 'Luxembourg Gaming Experience',
                'date' => '2022.09.15',
                'desc' => 'Luxembourg gaming experience is the place for gamers',
                'eventadmin_id' => 1,
                'community_id' => 1,
                'location_id' => 1,
                'alt_address_city' => 'Kirchberg',
                'alt_address_street' => 'Rue du Kirchberg',
                'alt_address_number' => '1475815646',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Luxembourg Card Game event',
                'date' => '2022.09.15',
                'desc' => 'Luxembourg card game gamers welcome',
                'eventadmin_id' => 1,
                'community_id' => 1,
                'location_id' => 1,
                'alt_address_city' => 'Differdange',
                'alt_address_street' => 'Rue de l eglise',
                'alt_address_number' => '14',
            ]
        );
        DB::table('meetups')->insert(
            [
                'name' => 'Voldemort is not dead',
                'date' => '2022.09.15',
                'desc' => 'King Cobra Man is the best man',
                'eventadmin_id' => 1,
                'community_id' => 1,
                'location_id' => 1,
                'alt_address_city' => 'Kayl',
                'alt_address_street' => 'Rue de Dudelange',
                'alt_address_number' => '646',
            ]
        );
    }
}
