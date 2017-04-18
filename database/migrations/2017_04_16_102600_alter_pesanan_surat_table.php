<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPesananSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pesanan_surats', function($table) {
				      $table->boolean('persetujuanDosenWali');
              $table->boolean('persetujuanKaprodi');
              $table->boolean('persetujuanWDII');
              $table->boolean('persetujuanWDI');
              $table->boolean('persetujuanDekan');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
