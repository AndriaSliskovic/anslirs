<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('sec_id')->unsigned();
            $table->string('naslov')->nullable();
            $table->string('podnaslov')->nullable();
            $table->longText('sadrzaj')->nullable();
            $table->string('slika')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });

        Schema::table('sections', function($table) {
            $table->foreign('sec_id')->references('id')->on('sect_cats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
