<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaidinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maidinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personalinfo_id');
            $table->string('maid_name')->nullable();
            $table->string('maid_nid')->nullable();
            $table->string('maid_contact')->nullable();
            $table->mediumText('maid_address')->nullable();
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
        Schema::dropIfExists('maidinfos');
    }
}
