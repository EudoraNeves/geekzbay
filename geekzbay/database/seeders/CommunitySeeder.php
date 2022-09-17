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
                'img' => 'https://images.ctfassets.net/s5n2t79q9icq/3dB5uyWzUH95O1ZPBNNUX5/6cff7c65a809285755ea24b164b6ac65/magic-logo.png?fm=webpph',
                'name' => 'Magic: The Gathering',
                'discordLink' => 'https://discord.gg/TkGhxGmsgff',
                'category_id' => 3
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'https://www.animefocal.com/img/logoluxembourg.jpg',
                'name' => 'Anime Focal',
                'discordLink' => 'https://discord.gg/TkGhxGmB',
                'category_id' => 1
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'https://cdn.discordapp.com/icons/678794935368941569/a2dcb6867394e5fa01ceb3cde9996edd.jpg?size=256',
                'name' => 'Komga',
                'discordLink' => 'https://discord.gg/komga-678794935368941569',
                'category_id' => 1,
            ]
        );

        DB::table('communities')->insert(
            [
                'img' => 'https://scontent.flux3-1.fna.fbcdn.net/v/t1.6435-9/75220721_2479936675388308_9126402365484695552_n.png?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=NqxVUyKaUhQAX8oYK63&_nc_ht=scontent.flux3-1.fna&oh=00_AT9hDdGzadiHIZ4_Dt1u0z6zwUTi9rJxGgIg9StJfhgLig&oe=63495ADE',
                'name' => 'SweetSpot Asbl',
                'discordLink' => 'https://discord.gg/6Kphx7876',
                'category_id' => 6,
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'https://scontent.flux3-1.fna.fbcdn.net/v/t1.6435-9/75220721_2479936675388308_9126402365484695552_n.png?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=NqxVUyKaUhQAX8oYK63&_nc_ht=scontent.flux3-1.fna&oh=00_AT9hDdGzadiHIZ4_Dt1u0z6zwUTi9rJxGgIg9StJfhgLig&oe=63495ADE',
                'name' => 'SweetSpot Asbl',
                'discordLink' => 'https://discord.gg/6KphxKU3',
                'category_id' => 6,
            ]
        );

        DB::table('communities')->insert(
            [
                'img' => 'https://i0.wp.com/www.letz-smash.lu/wp-content/uploads/2021/04/LetzSmash_logo_v2.png?fit=450%2C454&ssl=1',
                'name' => 'Letz Smash',
                'discordLink' => 'https://discord.gg/dMU4TVm3',
                'category_id' => 6,
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'https://cdn.discordapp.com/icons/832655735443554344/7db824ff281920ec3a0c91acf7e66cf2?size=48',
                'name' => 'Gaming Luxembourg',
                'discordLink' => 'discord.gg/2YeuPBR22X',
                'category_id' => 6,
            ]
        );
        DB::table('communities')->insert(
            [
                'img' => 'https://warhammer40000.com/wp-content/uploads/2020/08/ceMccBqn5bnymHmm-1200x800.jpg',
                'name' => 'lux wargame',
                'discordLink' => 'discord.gg/2YeuPfdgsdBR22X',
                'category_id' => 2,
            ]
        );
        DB::table('communities')->insert(
            [
                'name' => '',
                'discordLink' => '',
                'category_id' => 7
            ]
        );
    }
}
