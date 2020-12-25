<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersheetHabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charactersheet_habilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hability_id');
            $table->unsignedBigInteger('charactersheet_id');
            $table->unsignedBigInteger('points');
            $table->timestamps();

            $table->foreign('hability_id')
                ->references('id')
                ->on('habilities')
                ->onDelete('cascade');
            $table->foreign('charactersheet_id')
                ->references('id')
                ->on('charactersheet')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charactersheet_habilities');
    }
}
