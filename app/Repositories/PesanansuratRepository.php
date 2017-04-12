<?php
  namespace App\Repositories;

  use App\PesananSurat;

  class PesanansuratRepository{

    public function findAllPesananSurat(){
      $pesanansurats = PesananSurat::all();
      return $pesanansurats;
    }
    public function findPesananSuratByIdPesanan($idPesanan){
      $pesanansurats = PesananSurat::where('idPesanan', $idPesanan)->get();
      return $pesanansurats;
    }
    public function findMahasiswaByJenisSurat($jenis_surat){
      $pesanansurats = PesananSurat::where('jenis_surat', $jenis_surat)->get();
      return $pesanansurats;
    }
    public function findMahasiswaByPerihal($perihal){
      $pesanansurats = PesananSurat::where('perihal', $perihal)->get();
      return $pesanansurats;
    }
    public function findPesananSuratByPenerimaSurat($penerimaSurat){
      $pesanansurats = PesananSurat::where('penerimaSurat', $penerimaSurat)->get();
      return $pesanansurats;
    }
    public function findMahasiswaByPengirimSurat($pengirimSurat){
      $pesanansurats = PesananSurat::where('mahasiswa_id', $pengirimSurat)->get();
      return $pesanansurats;
    }
    public function findMahasiswaByTanggalPembuatan($tanggalPembuatan){
      $pesanansurats = PesananSurat::where('timestamps', $tanggalPembuatan)->get();
      return $pesanansurats;
    }
  }

 ?>
