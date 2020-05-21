<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
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
        		[
        			"title" => "Bus",
        			"description" => "For Company and large group",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Car",
        			"description" => "For personal or comapny with small group",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Bike",
        			"description" => "For personal use",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		]
        	]
        );
    }
}
