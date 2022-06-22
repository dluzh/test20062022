<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feeds')->insert([
            'id' => 1,
            'name' => 'CRUDed',
            'url' => '',
            'last_processed_at' => '2022-06-20 21:03:20',
            'created_at' => '2022-06-20 21:03:20',
            'updated_at' => '2022-06-20 21:03:20',
        ]);

        DB::table('feeds')->insert([
            'id' => 2,
            'name' => 'Lifehacker',
            'url' => 'https://lifehacker.com/rss',
            'last_processed_at' => '2022-06-20 21:03:20',
            'created_at' => '2022-06-20 21:03:20',
            'updated_at' => '2022-06-20 21:03:20',
        ]);
    }
}
