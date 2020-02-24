<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ename')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('sex')->nullable();
            $table->string('city')->nullable();
            $table->string('township')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop("member");
    }
}