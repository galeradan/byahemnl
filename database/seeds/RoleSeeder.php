<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('roles')->insert(
        	[
        		[
        			"title" => "SuperAdmin",
        			"description" => "For all access",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Admin",
        			"description" => "For restricted access",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Regular",
        			"description" => "For regular use",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		]
        	]
        );
    }
}
