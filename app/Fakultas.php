<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    public function jurusans(){
      return $this->hasMany(Jurusan::class);
    }

    //Dekan
    public function dosens(){
      return $this->hasOne(Dosen::class);
    }

    //WD I
    public function dosens(){
      return $this->hasOne(Dosen::class);
    }

    //WD II
    public function dosens(){
      return $this->hasOne(Dosen::class);
    }

    //WD III
    public function dosens(){
      return $this->hasOne(Dosen::class);
    }
}
