<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WebsiteConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webconfig', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nuevo');
            $table->string('ofertas');
            $table->string('maxipuntos');
            $table->string('mayoreo');
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
        Schema::drop('webconfig');
    }
}
