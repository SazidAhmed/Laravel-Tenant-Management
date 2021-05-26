<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->mediumText('date');
            $table->string('name');
            $table->string('father');
            $table->string('dob')->nullable();
            $table->string('married')->nullable();
            $table->mediumText('address');
            $table->string('occupation')->nullable();
            $table->mediumText('office')->nullable();
            $table->string('religion')->nullable();
            $table->string('education')->nullable();
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('image')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('userinfos');
    }
}
