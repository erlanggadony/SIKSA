<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MahasiswaRepository;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    //
    protected $mahasiswaRepo;

    public function __construct(MahasiswaRepository $mahasiswaRepo){
      // dd($formatsuratRepo);
        $this->mahasiswaRepo = $mahasiswaRepo;
        //dd($this->orders->getAllActive());
    }

    public function pilihMahasiswa(Request $request)
  	{
        //$confirmation = Confirmation::where(['id' => 2])->first();

        //dd($confirmation->order->tickets);
        //dd($confirmation);
        // //--
        $mahasiswas;
        if($request->kategori_mahasiswa == "nirm"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByNIRM($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "npm"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByNPM($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "nama_mahasiswa"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByNama($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "prodi"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByProdi($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "angkatan"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByAngkatan($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "kota_lahir"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByKotaLahir($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "tanggal_lahir"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByTanggalLahir($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "fakultas"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByFakultas($request->searchBox);
        }
        else if($request->kategori_mahasiswa == "dosenWali"){
          $mahasiswas = $this->mahasiswaRepo->findMahasiswaByDosenWali($request->searchBox);
        }
        else{
          $mahasiswas = $this->mahasiswaRepo->findAllMahasiswa();
        }
        // dd($mahasiswas);
        return view('TU.data_mahasiswa',[
        // dd($formatsurats);
            'mahasiswas' => $mahasiswas,
        ]);
  	}

    /**
    * Delete the selected data
    */
    public function destroy(Request $request){
        //
        // dd($request->deleteID);
        $mahasiswa = $this->getModel($request->deleteID);
        $mahasiswa->delete();
        return redirect('/data_mahasiswa')->with('success_message', 'Mahasiswa <b>#' . $request->id . '</b> berhasil dihapus.');;
    }

    /**
    * Get mahasiswa model by Id
    * @return Mahasiswa
    */
    private function getModel($id){
        $model = $this->mahasiswaRepo->findById($id);
        if($model === null){
            abort(404);
        }
        return $model;
    }

    public function uploadMahasiswa(Request $request){
      $mahasiswa = new Mahasiswa;
      $dataMhs = $request->file('uploadDataMhs');
      $baris;
      foreach ($dataMhs as $line_num => $line) {
          $baris .= $line.'<br>';
          $data = explode("/", $baris);  //ubah pemisahnya dengan yg ada di sql
          $mahasiswa->nirm = $data[0];
          $mahasiswa->npm = $data[1];
          $mahasiswa->nama_mahasiswa = $data[2];
          $mahasiswa->jurusan_id = $data[3];
          $mahasiswa->fakultas_id = $data[4];
          $mahasiswa->angkatan = $data[5];
          $mahasiswa->kota_lahir = $data[6];
          $mahasiswa->tanggal_lahir = $data[7];
          $mahasiswa->foto_mahasiswa = $data[8];
          $mahasiswa->dosen_id = $data[9];
          $mahasiswa->username = $data[10];
          $mahasiswa->password = $data[11];
      }
      return redirect('/data_mahasiswa')->with('success_message', 'Data mahasiswa telah di upload');
    }
}
