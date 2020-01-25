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
            $table->integer('quest_id')->references('id')->on('quests');
            $table->integer('user_id')->references('id')->on('users');
            $table->boolean('status');
            $table->smallInteger('progress');
            $table->date('start_date');
            $table->date('finish_date');
            $table->timestamps();
            $table->index(['quest_id', 'user_id']);
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
