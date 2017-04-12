<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    public function jurusans(){
      return $this->belongsTo(Jurusan::class);
    }

    public function mahasiswas(){
      return $this->hasMany(Mahasiswa::class);
    }
}
