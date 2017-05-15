<?php
  namespace App\Repositories;

  use App\User;

  class JurusanRepository{

    public function findJurusanById($id){
      $jurusan = Jurusan::where('id', $id)->first();
      return $jurusan;
    }
  }

 ?>
