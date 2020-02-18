<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_users', function (Blueprint $table) {
            $table->string('user_uid', 40);
            $table->smallInteger('level')->default(1);
            $table->integer('xp')->default(0);
            $table->unsignedTinyInteger('tier')->default(1);
            $table->timestamps();
            $table->primary('user_uid');
            $table->foreign('user_uid')->references('user_uid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_users');
    }
}
