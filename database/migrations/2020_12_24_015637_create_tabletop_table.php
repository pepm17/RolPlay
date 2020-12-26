<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabletopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabletop', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('dungeonMaster');
            $table->timestamps();

            $table->foreign('dungeonMaster')
                ->references('username')
                ->on('users')
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
        Schema::dropIfExists('tabletop');
    }
}
