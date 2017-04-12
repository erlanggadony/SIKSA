<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananSurat extends Model
{
    //
    public function mahasiswas(){
      return $this->belongsTo(Mahasiswa::class);
    }

    public function formatsurats(){
      return $this->belongsTo(Formatsurat::class);
    }

}
