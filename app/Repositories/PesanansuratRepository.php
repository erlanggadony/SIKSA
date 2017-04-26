<?php
  namespace App\Repositories;

  use App\PesananSurat;

  class PesanansuratRepository{

    public function findAllPesananSurat(){
      $pesanansurats = PesananSurat::orderBy('created_at', 'DESC')->paginate(15);
      return $pesanansurats;
    }
    public function findPesananSuratByIdPesanan($idPesanan){
      $pesanansurats = PesananSurat::where('idPesanan', $idPesanan)
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);
      return $pesanansurats;
    }
    public function findMahasiswaByJenisSurat($jenis_surat){
      $pesanansurats = PesananSurat::where('jenis_surat', $jenis_surat)
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);
      return $pesanansurats;
    }
    public function findMahasiswaByPerihal($perihal){
      $pesanansurats = PesananSurat::where('perihal', $perihal)
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);
      return $pesanansurats;
    }
    public function findPesananSuratByPenerimaSurat($penerimaSurat){
      $pesanansurats = PesananSurat::where('penerimaSurat', $penerimaSurat)
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);
      return $pesanansurats;
    }
    public function findMahasiswaByPengirimSurat($pengirimSurat){
      $pesanansurats = PesananSurat::where('mahasiswa_id', $pengirimSurat)
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);
      return $pesanansurats;
    }
    public function findMahasiswaByTanggalPembuatan($tanggalPembuatan){
      $pesanansurats = PesananSurat::where('timestamps', $tanggalPembuatan)
                                    ->orderBy('timestamps', 'DESC')
                                    ->paginate(15);
      return $pesanansurats;
    }
    public function findPesananSuratById($id){
      $pesanansurat = Pesanansurat::where('id', $id)->first();
      return $pesanansurat;
    }
  }

 ?>
