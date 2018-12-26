<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('naslov');
            $table->text('slug');
            $table->longText('sadrzaj');
            $table->date('vremeIzrade')->nullable();
            $table->integer('skill')->nullable();
            $table->string('slika')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('tipovi_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('posts', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('posts', function($table) {
            $table->foreign('tipovi_id')->references('id')->on('tipovis');
        });
        Schema::table('posts', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
