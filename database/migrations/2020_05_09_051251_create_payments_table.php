<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('month');
            $table->string('status')->nullable();
            $table->BigInteger('rent')->nullable();
            $table->BigInteger('waterbill')->nullable();
            $table->BigInteger('electbill')->nullable();
            $table->BigInteger('services')->nullable();
            $table->BigInteger('others')->nullable();
            $table->BigInteger('due')->nullable();
            $table->BigInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
