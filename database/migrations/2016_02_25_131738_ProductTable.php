<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('producttype',['Mexicuga','Mexicuga_Familia','MexiPuntos']);
            $table->enum('showas',['Producto_Normal','Lo_Nuevo','Oferta']);
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('department');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('trademark');
            $table->integer('provider_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->integer('catalogue_id')->unsigned();
            $table->foreign('catalogue_id')->references('id')->on('catalogue');
            $table->string('productcode');
            $table->enum('availability',[0,1,2]);
            $table->string('includes');
            $table->string('imagename');
            $table->string('code')->unique();
            $table->string('userName');
            $table->text('description');
            $table->string('salesunit');
            $table->string('color');
            $table->string('alto');
            $table->string('width');
            $table->string('long');
            $table->string('Weight');
            $table->string('additional_information');
            $table->string('deleveryfrom');
            $table->string('deleveryto');
            $table->string('deleverycondition');
            $table->string('nopage');
            $table->string('keywords');
            $table->string('measures');
            $table->float('normal_price');
            $table->float('public_price');
            $table->float('discount');
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
        Schema::drop('products');
    }
}
