<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('sponsor_id')->unsigned();
            $table->integer('asset_id')->unsigned()->nullable();
            $table->string('title', 25);
            $table->string('description', 250);
            $table->date('available_from');
            $table->date('valid_until');
            $table->foreign('sponsor_id')->references('id')->on('sponsors');
            $table->foreign('asset_id')->references('id')->on('assets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
