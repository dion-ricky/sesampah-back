<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGameItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_game_items', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->integer('game_item_id')->unsigned();
            $table->date('received_date');
            $table->timestamps();
            $table->primary(['user_id', 'game_item_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('game_item_id')->references('id')->on('game_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_game_items');
    }
}
