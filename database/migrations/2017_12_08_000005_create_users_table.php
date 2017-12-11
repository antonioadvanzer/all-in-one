<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->boolean('employed')->default(0);
            $table->integer('type_user')->unsigned();
            $table->integer('rol')->unsigned();
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_user')->references('id')->on('type_user');
            $table->foreign('rol')->references('id')->on('rol');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
