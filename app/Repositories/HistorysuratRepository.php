<?php
  namespace App\Repositories;

  use App\Historysurat;

  class historysuratRepository{
    function findAllHistorySurat(){
      $historysurats = Historysurat::orderBy('created_at', 'DESC')->paginate(15);
      return $historysurats;
    }
    public function findHistorySuratByNomorSurat($noSurat){
      $historysurats = Historysurat::where('noSurat', $noSurat)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findHistoryByJenisSurat($jenis_surat){
      $historysurats = Historysurat::where('jenis_surat', $jenis_surat)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findHistoryByPerihal($perihal){
      $historysurats = Historysurat::where('perihal', $perihal)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findHistorySuratByPenerimaSurat($penerimaSurat){
      $historysurats = Historysurat::where('penerimaSurat', $penerimaSurat)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }
    public function findHistoryByTanggalPembuatan($tanggalPembuatan){
      $historysurats = Historysurat::where('timestamps', $tanggalPembuatan)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(16);
      return $historysurats;
    }

    public function pesananDosenWali($dosen_id){
      $historysurats = Historysurat::where()
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);

      return $historysurats;
    }
  }

 ?>
