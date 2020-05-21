<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('approvals')->insert(
        	[
        		[
        			"title" => "Pending",
        			"description" => "waiting for approval",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Approved",
        			"description" => "Request Approved",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"title" => "Rejected",
        			"description" => "Request Rejected",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		]
        	]
        );
    }
}
