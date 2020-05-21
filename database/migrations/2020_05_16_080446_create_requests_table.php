<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_code');
            $table->unsignedBigInteger('user_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('total_rates',8,2);
            $table->unsignedBigInteger('approval_id');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('approval_id')
            ->references('id')
            ->on('approvals')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
