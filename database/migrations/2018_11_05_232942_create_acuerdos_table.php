<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcuerdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acta_id')->unsigned();
            $table->foreign('acta_id')->references('id')->on('actas')->onDelete('cascade');
            $table->text('acuerdo');
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
        Schema::dropIfExists('acuerdos');
    }
}
