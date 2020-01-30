<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ename');
            $table->string('phone');
            $table->string('email');
            $table->string('sex');
            $table->string('city');
            $table->string('township');
            $table->string('postcode');
            $table->string('address');
            $table->string('notes');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop("products");
    }
}