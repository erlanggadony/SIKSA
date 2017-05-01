<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MahasiswaRepository;
use Illuminate\Support\Facades\Auth;
use App\Mahasiswa;
use App\User;
use App\Dosen;
use App\TU;
class MahasiswaController extends Controller
{
    //
    protected $mahasiswaRepo;

    public function __construct(MahasiswaRepository $mahasiswaRepo){
      // dd($formatsuratRepo);
        $this->mahasiswaRepo = $mahasiswaRepo;
        //dd($this->orders->getAllActive());
    }

    public function tambahDataMahasiswa(){
      $loggedInUser = Auth::user();
      // dd($loggedInUser);
      $realUser = $this->getRealUser($loggedInUser);
      return view('TU.tambah_data_mahasiswa', [
        'user' => $realUser
      ]);
    }

    public function tampilkanSeluruhSurat(Request $request){
      $loggedInUser = Auth::user();
      // dd($loggedInUser);
      $realUser = $this->getRealUser($loggedInUser);
      // dd($realUser);

      return view('mahasiswa/home_mahasiswa',[
        'user' => $realUser
      ]);
    }

    private function getRealUser($loggedInUser){
      // dd($loggedInUser);
      $realUser='';
      // dd($realUser);
      if($loggedInUser->jabatan == User::JABATAN_MHS){
        $realUser = Mahasiswa::find($loggedInUser->ref);
        // dd($realUser);
        return $realUser;
      }else if($loggedInUser->jabatan == User::JABATAN_DOS){
        $realUser = Dosen::find($loggedInUser->ref);
        // dd($realUser);
        return $realUser;
      }else{ // TU
        $realUser = TU::find($loggedInUser->ref);
        // dd($loggedInUser->jabatan);
        return $realUser;
      }
      // dd($realUser);
    }

    public function pilihMahasiswa(Request $request){
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
        $loggedInUser = Auth::user();
        $realUser = $this->getRealUser($loggedInUser);
        return view('TU.data_mahasiswa',[
        // dd($formatsurats);
            'mahasiswas' => $mahasiswas,
            'user' => $realUser
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

      $dataMhs = $request->file('uploadDataMhs');
      $baris = '';
      foreach ($dataMhs as $line_num => $line) {

        $baris .= $line.'<br>';
        $data = explode("/", $baris);  //ubah pemisahnya dengan yg ada di sql
          $savedMahasiswa = Mahasiswa::create(array(
            'nirm' => $data[0],
            'npm' => $data[1],
            'nama_mahasiswa' => $data[2],
            'jurusan_id' => $data[3],
            'fakultas_id' => $data[4],
            'angkatan' => $data[5],
            'kota_lahir' => $data[6],
            'tanggal_lahir' => $data[7],
            'foto_mahasiswa' => $data[8],
            'dosen_id' => $data[9],
            'username' => $data[10]
          ));

          // dd($savedMahasiswa->id);,
          $savedUser = User::create(array(
            'ref' => $savedMahasiswa->id,
            'username' => $data[10],
            'password' => bycrypt($data[11])
          ));

          // $mahasiswa = new Mahasiswa;
          //
          // $mahasiswa->nirm = $data[0];
          // $mahasiswa->npm = $data[1];
          // $mahasiswa->nama_mahasiswa = $data[2];
          // $mahasiswa->jurusan_id = $data[3];
          // $mahasiswa->fakultas_id = $data[4];
          // $mahasiswa->angkatan = $data[5];
          // $mahasiswa->kota_lahir = $data[6];
          // $mahasiswa->tanggal_lahir = $data[7];
          // $mahasiswa->foto_mahasiswa = $data[8];
          // $mahasiswa->dosen_id = $data[9];
          // $mahasiswa->username = $data[10];
          // $mahasiswa->password = bycrypt($data[11]);
          // $mahasiswa->save();
      }
      return redirect('/data_mahasiswa')->with('success_message', 'Data mahasiswa telah di upload');
    }
}
