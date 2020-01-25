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
            $table->bigInteger('user_id')->references('id')->on('users');
            $table->integer('game_item_id')->references('id')->on('game_items');
            $table->date('received_date');
            $table->timestamps();
            $table->index(['user_id', 'game_item_id']);
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
