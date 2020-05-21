<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('document_id');
            $table->date('expiration_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('asset_id')
            ->references('id')
            ->on('assets')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('document_id')
            ->references('id')
            ->on('documents')
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
        Schema::dropIfExists('asset_document');
    }
}
