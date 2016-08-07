<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('pob');
            $table->timestamp('dob');
            $table->integer('age');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
