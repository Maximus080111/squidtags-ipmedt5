<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class registerShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registerd_shops')->insert([
            'StoreName' => '',
            'Adress' => null,
            'MaxVisit' => null,
            'averageTime' => null,
            'id' => 1,
        ]);
        DB::table('registerd_shops')->insert([
            'StoreName' => 'Walmart',
            'Adress' => null,
            'MaxVisit' => null,
            'averageTime' => null,
        ]);
        DB::table('registerd_shops')->insert([
            'StoreName' => 'Starbucks',
            'Adress' => null,
            'MaxVisit' => null,
            'averageTime' => null,
        ]);
        DB::table('registerd_shops')->insert([
            'StoreName' => 'Walmart',
            'Adress' => 'winkel 1',
            'MaxVisit' => null,
            'averageTime' => null,
        ]);
        DB::table('registerd_shops')->insert([
            'StoreName' => 'Starbucks',
            'Adress' => 'winkel 1',
            'MaxVisit' => null,
            'averageTime' => null,
        ]);
    }
}
