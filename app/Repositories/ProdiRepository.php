<?php
  namespace App\Repositories;

  use App\User;

  class ProdiRepository{

    public function findProdiById($id){
      $prodi = Prodi::where('id', $id)->first();
      return $prodi;
    }
  }

 ?>
