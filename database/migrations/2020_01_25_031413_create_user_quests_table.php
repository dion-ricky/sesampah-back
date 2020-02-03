<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quests', function (Blueprint $table) {
            $table->integer('quest_id');
            $table->integer('user_id');
            $table->boolean('status');
            $table->smallInteger('progress');
            $table->date('start_date');
            $table->date('finish_date');
            $table->timestamps();
            $table->primary(['quest_id', 'user_id']);
            $table->foreign('quest_id')->references('id')->on('quests');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_quests');
    }
}
