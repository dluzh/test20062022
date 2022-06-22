<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entries')->insert([
            'id' => 1,
            'title' => 'Test title 1',
            'link' => 'http://nowhere.com/1',
            'description' => 'Test description 1',
            'feed_id' => 2,
            'created_at' => '2022-06-20 21:03:20',
            'updated_at' => '2022-06-20 21:03:20',
        ]);
        DB::table('entries')->insert([
            'id' => 2,
            'title' => 'Test title 2',
            'link' => 'http://nowhere.com/2',
            'description' => 'Test description 2',
            'feed_id' => 2,
            'created_at' => '2022-06-20 21:03:20',
            'updated_at' => '2022-06-20 21:03:20',
        ]);
    }
}
