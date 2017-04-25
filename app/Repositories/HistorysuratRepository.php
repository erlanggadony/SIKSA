<?php
  namespace App\Repositories;

  use App\Historysurat;

  class historysuratRepository{
    function findAllhistorysurats(){
      $historysurats = Historysurat::orderBy('created_at', 'DESC')->paginate(15);
      return $historysurats;
    }
    public function findPesananSuratByNomorSurat($noSurat){
      $historysurats = Historysurat::where('noSurat', $noSurat)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findMahasiswaByJenisSurat($jenis_surat){
      $historysurats = Historysurat::where('jenis_surat', $jenis_surat)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findMahasiswaByPerihal($perihal){
      $historysurats = Historysurat::where('perihal', $perihal)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findPesananSuratByPenerimaSurat($penerimaSurat){
      $historysurats = Historysurat::where('penerimaSurat', $penerimaSurat)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findMahasiswaByTanggalPembuatan($tanggalPembuatan){
      $historysurats = Historysurat::where('timestamps', $tanggalPembuatan)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
  }

 ?>
