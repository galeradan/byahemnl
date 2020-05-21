<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
        	[
        	 "name" => "Dan Galera",
        	 "email" => "admin@gmail.com",
        	 "password" => Hash::make('password123'),
        	 "mobile_no" => "0908500510",
        	 "role_id" => 1,
        	 "created_at" => Carbon::now(),
        	 "updated_at" => Carbon::now()
        	]
        );
    }
}
