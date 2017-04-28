<?php
  namespace App\Repositories;

  use App\Mahasiswa;

  class DosenReposotory{
    public function fidById($id){
      $dosens = Dosen::where('id', $id)->first();
      return $dosens;
    }

  }
?>
