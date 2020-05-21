<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('phases')->insert(
        	[
        		[
        			"title" => "Acquisition",
        			"description" => "Processing phase",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Maintenance",
        			"description" => "Under Maintenance",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Rental",
        			"description" => "Available for Rental",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Rented",
        			"description" => "Currently rented by a client",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Returned",
        			"description" => "Returned but not yet processed",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		]
        	]
        );
    }
}
