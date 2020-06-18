<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergcontacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personalinfo_id');
            $table->string('emerg_name')->nullable();
            $table->string('emerg_relation')->nullable();
            $table->mediumText('emerg_address')->nullable();
            $table->string('emerg_contact')->nullable();
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
        Schema::dropIfExists('emergcontacts');
    }
}
