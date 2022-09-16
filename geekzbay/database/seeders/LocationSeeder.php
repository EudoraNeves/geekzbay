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

        DB::table('locations')->insert(
            [
                'name' => 'Respawn Bar',
                'profilePicture' => 'https://www.tacotac.lu/sites/default/files/styles/big/public/reas-img/20210218_145523_0.jpg?itok=LrMvlKyV',
                'type' => 'Bar',
                'desc' => 'The Respawn bar is situated in the center of Luxembourg and prides itself on being the first e-sport and gaming bar in Luxembourg. 400 square meters dedicated to gaming in multiple spaces. Come enjoy a drink with friends or colleagues while playing.',
                'homePage' => 'https://respawn.lu/',
                'address_city' => 'Luxembourg',
                'address_road' => 'Rue du Fort Neippeg',
                'address_number' => '65'
            ]
        );

        DB::table('locations')->insert(
            [
                'name' => 'Le reservoir',
                'profilePicture' => 'Independent store located in the center of Luxembourg since 2006, specializing in the sale of video games, films, music, comics, manga and figurines.',
                'type' => 'Shop',
                'desc' => 'The Respawn bar is situated in the center of Luxembourg and prides itself on being the first e-sport and gaming bar in Luxembourg. 400 square meters dedicated to gaming in multiple spaces. Come enjoy a drink with friends or colleagues while playing.',
                'homePage' => 'https://www.lereservoir.lu',
                'address_city' => 'Luxembourg',
                'address_road' => 'Grand-Rue',
                'address_number' => '30'
            ]
        );

        DB::table('locations')->insert(
            [
                'name' => 'Kinepolis Belval',
                'profilePicture' => 'https://www.marketers.lu/sites/marketers/files/2021-02/kinepolis%20esch.jpg',
                'type' => 'Cinema',
                'desc' => 'Cinema inside of the belval plaza.',
                'homePage' => 'https://kinepolis.lu/?',
                'address_city' => 'Esch-sur-Alzette',
                'address_road' => 'Av. du Rock\'n\'Roll',
                'address_number' => '7',
            ]
        );
        DB::table('locations')->insert(
            [
                'name' => 'Kinepolis Kirchberg',
                'profilePicture' => 'https://www.europa-cinemas.org/storage/ecdbimages/salle/SP-3997-5411-resize-668.jpg',
                'type' => 'Cinema',
                'desc' => 'Cinema locate in Kirchberg.',
                'homePage' => 'https://kinepolis.lu/?',
                'address_city' => 'Kirchberg',
                'address_road' => 'Av. John F. Kennedy',
                'address_number' => '45',
            ]
        );
        DB::table('locations')->insert(
            [
                'name' => 'Slumberland BD World Belval Plaza',
                'profilePicture' => 'https://cloudfront-eu-central-1.images.arcpublishing.com/ipmgroup/Q2DMGCRARZF3FPWJNRWHYISTMU.jpg',
                'type' => 'Library',
                'desc' => 'The Respawn bar is situated in the center of Luxembourg and prides itself on being the first e-sport and gaming bar in Luxembourg. 400 square meters dedicated to gaming in multiple spaces. Come enjoy a drink with friends or colleagues while playing.',
                'homePage' => 'https://www.slumberlandbdworld.com',
                'address_city' => 'Esch-sur-Alzette',
                'address_road' => 'Av. John F. Kennedy',
                'address_number' => '7-14',
            ]
        );
        DB::table('locations')->insert(
            [
                'name' => 'Inked Geeks',
                'profilePicture' => 'https://res.cloudinary.com/tobeinstore/image/upload/q_80,f_auto/v1618502367/content/shops/shop-inked-geeks-esch-sur-alzette-luxembourg/shop-inked-geeks-esch-sur-alzette-luxembourg-eoyUCFEP6Y.jpg',
                'type' => 'Library',
                'desc' => 'Concept Store
                TCG,Comic,Manga,Miniature wargaming co & Piercing',
                'homePage' => 'https://inkedgeeks.business.site/?utm_source=gmb&utm_medium=referral',
                'address_city' => 'Esch-sur-Alzette',
                'address_road' => 'Rue de l\'Alzette',
                'address_number' => '42',
            ]
        );
        DB::table('locations')->insert(
            [
                'name' => 'Player One',
                'profilePicture' => 'https://lh3.googleusercontent.com/p/AF1QipPjGxH0_9g3LgTkWN4S-e6pnytm3Om3B3Zt7aEh=w768-h768-n-o-v1',
                'type' => 'Shop',
                'desc' => 'Small shop to buy & sell new or second hand games.',
                'homePage' => 'nun',
                'address_city' => 'Differdange',
                'address_road' => 'Rue de la Grève Nationale',
                'address_number' => '15',
            ]
        );
        DB::table('locations')->insert(
            [
                'name' => 'Electro Viaduc',
                'profilePicture' => 'https://res.cloudinary.com/tobeinstore/image/upload/q_80,f_auto,w_600,h_400/q_80,f_auto/v1618501853/content/shops/shop-electro-viaduc-sarl-luxembourg-luxembourg/shop-electro-viaduc-sarl-luxembourg-luxembourg-9gbUVzx8Et.jpg',
                'type' => 'Shop',
                'desc' => 'Small shop of retro new games, console and music disque.',
                'homePage' => 'Nun',
                'address_city' => 'Luxembourg',
                'address_road' => 'Bd d\'Avranches',
                'address_number' => ' 6-10',
            ]
        );
    }
}
