<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicmacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micmacs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('proyecto');
            $table->string('variable');
            $table->float('influencia');
            $table->float('dependencia');
            $table->string('descripcion');
            $table->string('zona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('micmacs');
    }
}
