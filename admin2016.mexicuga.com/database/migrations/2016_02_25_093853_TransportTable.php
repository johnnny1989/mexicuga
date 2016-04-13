<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('personname');
            $table->string('phonetype');
            $table->string('phoneno');
            $table->string('email');
            $table->string('website');
            $table->string('comments');
            $table->enum('vis',[0,1]);
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
        Schema::drop('transporter');
    }
}
