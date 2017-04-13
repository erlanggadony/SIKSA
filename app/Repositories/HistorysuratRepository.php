<?php
  namespace App\Repositories;

  use App\Historysurat;

  class historysuratRepository{
    function findAllhistorysurats(){
      $historysurats = Historysurat::all();
      return $historysurats;
    }
    public function findPesananSuratByNomorSurat($noSurat){
      $historysurats = Historysurat::where('noSurat', $noSurat)->get();
      return $historysurats;
    }
    public function findMahasiswaByJenisSurat($jenis_surat){
      $historysurats = Historysurat::where('jenis_surat', $jenis_surat)->get();
      return $historysurats;
    }
    public function findMahasiswaByPerihal($perihal){
      $historysurats = Historysurat::where('perihal', $perihal)->get();
      return $historysurats;
    }
    public function findPesananSuratByPenerimaSurat($penerimaSurat){
      $historysurats = Historysurat::where('penerimaSurat', $penerimaSurat)->get();
      return $historysurats;
    }
    public function findMahasiswaByTanggalPembuatan($tanggalPembuatan){
      $historysurats = Historysurat::where('timestamps', $tanggalPembuatan)->get();
      return $historysurats;
    }
  }

 ?>
