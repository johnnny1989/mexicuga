<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastname');
            $table->string('maternalname');
            $table->string('phone');
            $table->string('mobile');
            $table->string('company');
            $table->string('webpage');
            $table->string('bill_name');
            $table->string('bill_rfc');
            $table->string('bill_cp');
            $table->string('bill_street');
            $table->string('bill_noext');
            $table->string('bill_noint');
            $table->string('bill_colony');
            $table->string('bill_muncipility');
            $table->string('bill_state');
            $table->string('bill_country');
            $table->string('ship_cp');
            $table->string('ship_street');
            $table->string('ship_noext');
            $table->string('ship_noint');
            $table->string('ship_colony');
            $table->string('ship_muncipility');
            $table->string('ship_state');
            $table->string('ship_country');
            $table->enum('status',[1,0]);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('profile');
    }
}
