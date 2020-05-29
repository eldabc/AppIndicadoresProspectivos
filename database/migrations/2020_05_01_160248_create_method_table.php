<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_method');            
            $table->integer('proyecto_id')->unsigned();            
            $table->foreign('proyecto_id')->references('id')->on('micmacs');
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
        Schema::dropIfExists('method');
    }
}
