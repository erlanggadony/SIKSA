<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansuratmatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanansuratmatakuliahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('matakuliah_id')->index();
            $table->string('pesanansurat_id')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanansuratmatakuliahs');
    }
}
