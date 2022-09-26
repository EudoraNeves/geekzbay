<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Categories Seeder

        DB::table('categories')->insert(
            [   //1
                'name' => 'Animes/Mangas',
                'icon' => 'anime.svg'
            ]
        );
        DB::table('categories')->insert(
            [ //2
                'name' => 'Boardgames',
                'icon' => 'Board_game.svg'
            ]
        );
        DB::table('categories')->insert(
            [ //3
                'name' => 'Cardgames',
                'icon' => 'Card_icon.svg'
            ]
        );
        DB::table('categories')->insert(
            [ //4
                'name' => 'Comics',
                'icon' => 'Book_icon.svg'
            ]
        );

        DB::table('categories')->insert(
            [ //5
                'name' => 'Movies/Series',
                'icon' => 'Popcorne'
            ]
        );
        DB::table('categories')->insert(
            [ //6
                'name' => 'Videogames',
                'icon' => 'game_icon1.svg'
            ]
        );
    }
}
