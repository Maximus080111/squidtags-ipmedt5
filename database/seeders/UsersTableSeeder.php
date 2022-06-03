<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Gerben',
            'lname' => 'Mol',
            'email' => 'gerben@test.com',
            'isAdmin' => true,
            'phoneNumber' => '0623842409',
            'password' => bcrypt('ww'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Max',
            'lname' => 'Overbeek',
            'email' => 'max@test.com',
            'isAdmin' => true,
            'phoneNumber' => '0612345678',
            'password' => bcrypt('ww'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Mark',
            'lname' => 'van Muijen',
            'email' => 'mark@test.com',
            'isAdmin' => true,
            'phoneNumber' => '0634123123',
            'password' => bcrypt('ww'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Gino',
            'lname' => 'Boer',
            'email' => 'gino@test.com',
            'isAdmin' => true,
            'phoneNumber' => '69',
            'password' => bcrypt('ww'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Melvin',
            'lname' => 'Vliet',
            'email' => 'melvin@test.com',
            'isAdmin' => true,
            'phoneNumber' => '420',
            'password' => bcrypt('ww'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Dummy',
            'lname' => 'Account',
            'email' => 'dummy@test.com',
            'isAdmin' => false,
            'phoneNumber' => '10',
            'password' => bcrypt('ww'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Test',
            'lname' => 'Owner',
            'email' => 'test@walmart.com',
            'isAdmin' => false,
            'phoneNumber' => '101',
            'storeOwner' => 'Walmart',
            'password' => bcrypt('ww'),
        ]);
    }
}
