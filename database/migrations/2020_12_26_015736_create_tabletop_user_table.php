<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabletopUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabletop_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tabletop_id');
            $table->string('user_username');
            $table->timestamps();

            $table->foreign('tabletop_id')
                ->references('id')
                ->on('tabletop')
                ->onDelete('cascade');
            $table->foreign('user_username')
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
        Schema::dropIfExists('tabletop_user');
    }
}
