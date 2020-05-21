<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->unsignedBigInteger('type_id');
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('request_id')
            ->references('id')
            ->on('requests')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('type_id')
            ->references('id')
            ->on('types')
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
        Schema::dropIfExists('request_type');
    }
}
