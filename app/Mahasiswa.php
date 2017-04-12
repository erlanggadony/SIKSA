<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    public function jurusans(){
      return $this->belongsTo(Jurusan::class);
    }

    public function dosens(){
      return $this->belongsTo(Dosen::class);
    }

    public function pesanansurats(){
      return $this->hasMany(PesananSurat::class);
    }
}
