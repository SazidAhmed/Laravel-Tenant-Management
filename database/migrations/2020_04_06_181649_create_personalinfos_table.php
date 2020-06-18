<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('floor')->nullable();
            $table->string('person_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->mediumText('permanent_address')->nullable();
            $table->string('occupation')->nullable();
            $table->mediumText('office_address')->nullable();
            $table->string('religion')->nullable();
            $table->string('edu_qualification')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport_no')->nullable();
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
        Schema::dropIfExists('personalinfos');
    }
}
