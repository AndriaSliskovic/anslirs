<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('putanja');
            $table->integer('level')->nullable()->default(1);
            $table->integer('tezina')->nullable()->default(1);
            $table->integer('oblast_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('menus', function($table) {
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
        Schema::dropIfExists('menus');
    }
}
