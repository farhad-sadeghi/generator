<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('addres')->nullable();
            $table->string('phone')->nullable();
            $table->string('post_code')->nullable();
            $table->string('email')->nullable();
            $table->text('text')->nullable();
            $table->string('product')->nullable();
            $table->integer('number')->nullable();
            $table->string('price')->nullable();
            $table->boolean('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
