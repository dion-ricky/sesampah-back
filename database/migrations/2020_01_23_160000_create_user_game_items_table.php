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
            $table->string('user_uid', 40);
            $table->integer('game_item_id')->unsigned();
            $table->date('received_date');
            $table->timestamps();
            $table->primary(['user_uid', 'game_item_id']);
            $table->foreign('user_uid')->references('user_uid')->on('users');
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
