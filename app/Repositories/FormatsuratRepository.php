<?php
  namespace App\Repositories;

  use App\Formatsurat;

  class FormatsuratRepository{

    public function findAllFormatsurat(){
      $formatsurats = Formatsurat::all();
      return $formatsurats;
    }
    public function findMahasiswaByIdFormatSurat($idFormatSurat){
      $formatsurats = Formatsurat::where('idFormatSurat', $idFormatSurat)->get();
      return $formatsurats;
    }
    public function findMahasiswaByJenisSurat($jenis_surat){
      $formatsurats = Formatsurat::where('jenis_surat', $jenis_surat)->get();
      return $formatsurats;
    }
    public function findMahasiswaByKeteranganSurat($keterangan){
      $formatsurats = Formatsurat::where('keterangan', $keterangan)->get();
      return $formatsurats;
    }
    public function findById($id){
      $formatsurats = Formatsurat::where('id', $id);
      return $formatsurats;
    }
  }

 ?>
