<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_sampah_id')->unsigned();
            $table->string('user_uid', 40);
            $table->boolean('is_incoming');
            $table->boolean('is_money');
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('bank_sampah_id')->references('id')->on('bank_sampah');
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
        Schema::dropIfExists('transaksi');
    }
}
