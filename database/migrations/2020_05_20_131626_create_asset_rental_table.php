<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_rental', function (Blueprint $table) {
            //
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('rental_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('rental_id')
            ->references('id')
            ->on('rentals')
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
        
            //
           Schema::dropIfExists('asset_rental');
       
    }
}
