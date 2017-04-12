<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
    //
    {
    public function mahasiswas(){
      return $this->hasMany(Mahasiswa::class);
    }

    public function matakuliahs(){
      return $this->hasMany(Matakuliah::class);
    }

    public function dosens(){
      return $this->hasMany(Dosen::class);
    }

    public function fakultass(){
      return $this->belongsTo(Fakultas::class);
    }

    public function dosens(){
      return $this->hasOne(Dosen::class);
    }
}
