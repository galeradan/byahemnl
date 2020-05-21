<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_maintenance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklist_id');
            $table->unsignedBigInteger('maintenance_id');
            $table->text('notes');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('checklist_id')
            ->references('id')
            ->on('checklists')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('maintenance_id')
            ->references('id')
            ->on('maintenances')
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
        Schema::dropIfExists('checklist_maintenance');
    }
}
