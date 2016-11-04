<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('users')->insert([
            [
                'name' => 'Peter Reginald',
                'email' => 'peter@reginald.com.au',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'James Dean',
                'email' => 'james@dean.com',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
