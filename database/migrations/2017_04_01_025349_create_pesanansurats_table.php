<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanansurats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('idPesananSurat')->unique();
            $table->string('perihal');
            $table->integer('mahasiswa_id')->index();
            $table->integer('formatsurats_id')->index();
            $table->string('dataSurat');
            $table->string('penerimaSurat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanansurats');
    }
}
