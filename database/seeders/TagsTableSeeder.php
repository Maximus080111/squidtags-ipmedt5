<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
             'TagData' => '12345678',
             'TagName' => 'Gerries Tag',
             'user_id' => 1,
        ]);
    }
}
