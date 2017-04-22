<?php
  namespace App\Repositories;

  use App\Mahasiswa;

  class MahasiswaRepository{

    public function findAllMahasiswa(){
      $mahasiswas = Mahasiswa::all();
      return $mahasiswas;
    }

    public function findMahasiswaByNIRM($nirm){
      $mahasiswas = Mahasiswa::where('nirm', $nirm)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByNPM($npm){
      $mahasiswas = Mahasiswa::where('npm', $npm)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByNama($nama_mahasiswa){
      $mahasiswas = Mahasiswa::where('nama_mahasiswa', $nama_mahasiswa)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByProdi($prodi){
      $mahasiswas = Mahasiswa::where('jurusan_id', $prodi)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByAngkatan($angkatan){
      $mahasiswas = Mahasiswa::where('angkatan', $angkatan)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByKotaLahir($kota_lahir){
      $mahasiswas = Mahasiswa::where('kota_lahir', $kota_lahir)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByTanggalLahir($tanggal_lahir){
      $mahasiswas = Mahasiswa::where('tanggal_lahir', $tanggal_lahir)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByFakultas($fakultas){
      $mahasiswas = Mahasiswa::where('fakultas_id', $fakultas)->get();
      return $mahasiswas;
    }
    public function findMahasiswaByDosenWali($dosenWali){
      $mahasiswas = Mahasiswa::where('dosen_id', $dosenWali)->get();
      return $mahasiswas;
    }
    public function findMahasiswaById($id){
      $mahasiswa = Mahasiswa::where('id', $id)->first();
      return $mahasiswa;
    }
    public function findUsername($username){
      $mahasiswas = Mahasiswa::where('username', $username)->get();
      return $mahasiswas;
    }
    public function findPasword($password){
      $mahasiswas = Mahasiswa::where('password', $password)->get();
      return $mahasiswas;
    }
  }

 ?>
