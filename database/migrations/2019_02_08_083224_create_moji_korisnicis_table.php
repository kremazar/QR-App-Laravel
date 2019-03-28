<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMojiKorisnicisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moji_korisnicis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('prezime');
            $table->string('email')->unique();
            $table->string('broj_telefona');
            $table->string('adresa');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moji_korisnicis');
    }
}
