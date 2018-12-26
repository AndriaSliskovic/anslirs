<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaDokumenti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->longText('opis')->nullable();
            $table->string('putanja');
            $table->integer('oblast_id')->unsigned()->default(1);
            $table->date('vremeIzrade')->nullable();
            $table->timestamps();
        });
        Schema::table('dokumentis', function($table) {
            $table->foreign('oblast_id')->references('id')->on('oblasts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('dokumentis');
    }
}
