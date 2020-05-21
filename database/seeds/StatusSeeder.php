<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

         DB::table('statuses')->insert(
        	        [//
        		        [
        		        	"title" => "Ongoing",
        		        	"description" => "For Ongoing rentals",
        		        	"created_at" => Carbon::now(),
        		        	"updated_at" => Carbon::now()
        		        ],
        		        [
        		        	"title" => "Scheduled",
        		        	"description" => "For Scheduled rentals",
        		        	"created_at" => Carbon::now(),
        		        	"updated_at" => Carbon::now()
        		        ],
        		        [
        		        	"title" => "Completed",
        		        	"description" => "For Completed Rentals",
        		        	"created_at" => Carbon::now(),
        		        	"updated_at" => Carbon::now()
        		        ]
        	        ]
        );
    }
}
