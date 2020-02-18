<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vouchers', function (Blueprint $table) {
            $table->string('user_uid', 40);
            $table->integer('voucher_id')->unsigned();
            $table->boolean('is_valid');
            $table->date('received_date');
            $table->date('used_date');
            $table->timestamps();
            $table->primary(['user_uid', 'voucher_id']);
            $table->foreign('user_uid')->references('user_uid')->on('users');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vouchers');
    }
}
