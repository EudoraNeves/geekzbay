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
        //
        DB::table('categories')->insert(
            [
                'name' => 'Animes',
                'icon' => ''
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Boardgames',
                'icon' => ''
            ]
        );
        DB::table('categories')->insert(
<<<<<<< Updated upstream
            [
                'name' => 'Cardgames',
                'icon' => ''
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Comics',
                'icon' => ''
=======
            [ //3
                'name' => 'Cardgames',
                'icon' => 'Card_icon.svg'
>>>>>>> Stashed changes
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Mangas',
                'icon' => ''
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Movies',
                'icon' => ''
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Videogames',
                'icon' => ''
            ]
        );
    }
}
