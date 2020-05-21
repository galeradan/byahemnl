<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAssetFromRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            //

            // $table->dropForeign('assets_category_id_foreign');
            $table->dropColumn('asset_id');
            $table->dropColumn('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('asset_id');
            $table->text('notes');
             $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }
}
