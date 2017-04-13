<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FormatsuratRepository;
use App\Formatsurat;

class FormatsuratController extends Controller
{
    //
    protected $formatsuratRepo;

    public function __construct(FormatsuratRepository $formatsuratRepo){
      // dd($formatsuratRepo);
        $this->formatsuratRepo = $formatsuratRepo;
        //dd($this->orders->getAllActive());
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function pilihSurat(Request $request)
	{
        //$confirmation = Confirmation::where(['id' => 2])->first();

        //dd($confirmation->order->tickets);
        //dd($confirmation);
        //--

        $formatsurats = $this->formatsuratRepo->findAllFormatsurat();
        // dd($formatsurats);
        return view('mahasiswa.pilih_jenis_surat',[
            'formatsurats' => $formatsurats,
        ]);
	}

public function tampilkanSeluruhFormat(Request $request)
{
      //$confirmation = Confirmation::where(['id' => 2])->first();

      //dd($confirmation->order->tickets);
      //dd($confirmation);
      //--
      $formatsurats;
      if($request->kategori_format_surat == "idFormatSurat"){
        $formatsurats = $this->formatsuratRepo->findMahasiswaByIdFormatSurat($request->searchBox_format_surat);
      }
      else if($request->kategori_format_surat == "jenis_surat"){
        $formatsurats = $this->formatsuratRepo->findMahasiswaByJenisSurat($request->searchBox_format_surat);
      }
      else if($request->kategori_format_surat == "keterangan"){
        $formatsurats = $this->formatsuratRepo->findMahasiswaByKeteranganSurat($request->searchBox_format_surat);
      }
      else{
        $formatsurats = $this->formatsuratRepo->findAllFormatsurat();
      }
      // dd($formatsurats);
      return view('TU.format_surat',[
          'formatsurats' => $formatsurats,
      ]);
    }

    /**
    * Delete the selected data
    */
    public function destroy(Request $request)
    {
        //
        // dd($request->deleteID);
        $formatsurat = $this->getModel($request->deleteID);
        $formatsurat->delete();
        return redirect('/format_surat')->with('success_message', 'Format surat <b>#' . $request->id . '</b> berhasil dihapus.');
    }

    /**
    * Get mahasiswa model by Id
    * @return Mahasiswa
    */
    private function getModel($id){
        $model = $this->formatsuratRepo->findById($id);
        if($model === null){
            abort(404);
        }
        return $model;
    }

    public function storeFormat(Request $request){
        $formatsurat = new Formatsurat;

        $formatsurat->idFormatSurat = $request->idFormatSurat;
        $formatsurat->jenis_surat = $request->jenis_surat;
        $formatsurat->keterangan = $request->keterangan;
    }

    public function tampilkanFormulir(Request $request){
        if($request->jenis_surat == "1"){
          return view('mahasiswa.data_keterangan_beasiswa', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "2"){
          return view('mahasiswa.data_keterangan_mahasiswa_aktif', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "3"){
          return view('mahasiswa.data_pembuatan_visa', ['formatsurat_id' => $request->jenis_surat]);
        }
    }

    private function buatJSON($request){
      if($request->jenis_surat == "1"){
          $obj = [
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'npm' => $request->npm,
            'semester' => $request->semester,
            'thnAkademik' => $request->thnAkademik,
            'jenisbeasiswa' => $request->jenisbeasiswa,
          ];
      }
      else if($request->jenis_surat == "2"){
          $obj = [
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'npm' => $request->npm,
            'kota_lahir' => $request->kota_lahir,
            'tglLahir' => $request->tglLahir,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
          ];
      }
      else if($request->jenis_surat == "3"){
          $obj = [
            'nama' => $request->nama,
            'tglLahir' => $request->tglLahir,
            'kewarganegaraan' => $request->kewarganegaraan,
            'organisasiTujuan' => $request->organisasiTujuan,
            'thnAkademik' => $request->thnAkademik,
            'negaraTujuan' => $request->negaraTujuan,
            'tanggalKunjungan' => $request->tanggalKunjungan
          ];
      }
      return json_encode($obj);
    }

    public function tampilkanIsiForm(Request $request){
      if($request->jenis_surat == "1"){
        $nama = $request->nama;
        $prodi = $request->prodi;
        $npm = $request->npm;
        $semester = $request->semester;
        $thnAkademik = $request->thnAkademik;
        $jenisbeasiswa = $request->jenisbeasiswa;
        $formatsurat_id = $request->jenis_surat;
        // dd($formatsurat_id);
        $dataSurat = $this->buatJSON($request);
        // dd($dataSurat);
        return view('mahasiswa.preview_keterangan_beasiswa', [
            'nama' => $nama,
            'prodi' => $prodi,
            'npm' => $npm,
            'semester' => $semester,
            'thnAkademik' => $thnAkademik,
            'jenisbeasiswa' => $jenisbeasiswa,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "2"){
        $nama = $request->nama;
        $prodi = $request->prodi;
        $npm = $request->npm;
        $kota_lahir = $request->kota_lahir;
        $tglLahir = $request->tglLahir;
        $semester = $request->semester;
        $alamat = $request->alamat;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        // dd($dataSurat);
        return view('mahasiswa.preview_keterangan_mahasiswa_aktif', [
            'nama' => $nama,
            'prodi' => $prodi,
            'npm' => $npm,
            'kota_lahir' => $kota_lahir,
            'tglLahir' => $tglLahir,
            'alamat' => $alamat,
            'semester' => $semester,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "3"){
        $nama = $request->nama;
        $tglLahir = $request->tglLahir;
        $kewarganegaraan = $request->kewarganegaraan;
        $organisasiTujuan = $request->organisasiTujuan;
        $thnAkademik = $request->thnAkademik;
        $negaraTujuan = $request->negaraTujuan;
        $tanggalKunjungan = $request->tanggalKunjungan;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        // dd($dataSurat);
        return view('mahasiswa.preview_pembuatan_visa', [
            'nama' => $nama,
            'tglLahir' => $tglLahir,
            'kewarganegaraan' => $kewarganegaraan,
            'organisasiTujuan' => $organisasiTujuan,
            'thnAkademik' => $thnAkademik,
            'negaraTujuan' => $negaraTujuan,
            'tanggalKunjungan' => $tanggalKunjungan,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
    }
}
