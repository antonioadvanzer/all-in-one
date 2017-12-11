<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_repository', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('rol')->unsigned();
            $table->integer('repository')->unsigned();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rol')->references('id')->on('rol');
            $table->foreign('repository')->references('id')->on('repository');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_repository');
    }
}
