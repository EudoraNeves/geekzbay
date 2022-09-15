<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('communities')->insert(
            [
                'name' => 'Magic: The Gathering',
                'discordLink' => '',
                'category_id' => 3
            ]
        );
        DB::table('communities')->insert(
            [
                'name' => 'Team Fight Tactics',
                'discordLink' => '',
                'category_id' => 7
            ]
        );
    }
}
