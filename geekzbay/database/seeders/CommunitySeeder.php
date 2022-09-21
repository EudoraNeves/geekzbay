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
                'img' => 'magic.png',
                'name' => 'Magic: The Gathering',
                'discordLink' => 'https://discord.gg/TkGhxGmsgff',
                'category_id' => 3,
                'desc' => '',
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'anime_focal.png',
                'name' => 'Anime Focal',
                'discordLink' => 'https://discord.gg/TkGhxGmB',
                'category_id' => 1,
                'desc' => '',
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'Komga.png',
                'name' => 'Komga',
                'discordLink' => 'https://discord.gg/komga-678794935368941569',
                'category_id' => 1,
                'desc' => '',
            ]
        );

        DB::table('communities')->insert(
            [
                'img' => 'Sweetspot.png',
                'name' => 'SweetSpot Asbl',
                'discordLink' => 'https://discord.gg/6Kphx7876',
                'category_id' => 6,
            ]
        );


        DB::table('communities')->insert(
            [
                'img' => 'Let_Smash.png',
                'name' => 'Letz Smash',
                'discordLink' => 'https://discord.gg/dMU4TVm3',
                'category_id' => 6,
                'desc' => '',
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'gaming.png',
                'name' => 'Fighting Corner',
                'discordLink' => 'discord.gg/2YeuPBR22X',
                'category_id' => 6,
                'desc' => '',
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'Wargame.png',
                'name' => 'lux wargame',
                'discordLink' => 'discord.gg/2YeuPfdgsdBR22X',
                'category_id' => 2,
                'desc' => '',
            ]
        );
    }
}
