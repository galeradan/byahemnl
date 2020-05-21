<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('model_id');
            $table->year('year');
            $table->string('trim');
            $table->string('body');
            $table->string('vin');
            $table->string('plate_no');
            $table->unsignedBigInteger('garage_id');
            $table->unsignedBigInteger('phase_id');
            $table->unsignedBigInteger('staff_id');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('model_id')
            ->references('id')
            ->on('types')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('garage_id')
            ->references('id')
            ->on('garages')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('phase_id')
            ->references('id')
            ->on('phases')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('staff_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('assets');
    }
}
