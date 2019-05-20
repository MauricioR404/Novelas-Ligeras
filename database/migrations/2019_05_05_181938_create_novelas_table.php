<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('autor');
            $table->string('generos');
            $table->string('traductor');
            $table->string('editor');
            $table->text('descripcion');
            $table->string('imagen');
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
        Schema::dropIfExists('novelas');
    }
}
