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
	 * Menampilkan seluruh format surat di halaman pilih jenis surat saat mahasiswa hendak memilih jenis surat
	 *
	 * @return view
	 */
	public function pilihSurat(Request $request){
        $formatsurats = $this->formatsuratRepo->findAllFormatsurat();
        return view('mahasiswa.pilih_jenis_surat',[
            'formatsurats' => $formatsurats,
        ]);
	}

  /**
  * Menampilkan seluruh format surat di halaman format surat milik TU
  *
  * @return view
  */
public function tampilkanSeluruhFormat(Request $request){
      //$confirmation = Confirmation::where(['id' => 2])->first();

      //dd($confirmation->order->tickets);
      //dd($confirmation);
      //--
      $formatsurats;
      if($request->kategori_format_surat == "idFormatSurat"){
        $formatsurats = $this->formatsuratRepo->findFormatsuratByIdFormatSurat($request->searchBox_format_surat);
      }
      else if($request->kategori_format_surat == "jenis_surat"){
        $formatsurats = $this->formatsuratRepo->findFormatsuratByJenisSurat($request->searchBox_format_surat);
      }
      else if($request->kategori_format_surat == "keterangan"){
        $formatsurats = $this->formatsuratRepo->findFormatsuratByKeteranganSurat($request->searchBox_format_surat);
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
    public function destroy(Request $request){
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

        //upload
        $format = $request->file('uploadFormat');
        // dd($format);
        $destination_path = 'format_surat_latex/';
        $filename = $format->getClientOriginalName();
        // dd($filename);
        $format->move($destination_path, $filename);

        //store to db
        $formatsurat->idFormatSurat = $request->idFormatSurat;
        $formatsurat->jenis_surat = $request->jenis_surat;
        $formatsurat->keterangan = $request->keterangan;
        $formatsurat->link_format_surat = '127.0.0.1:8000/format_surat_latex/' . $filename;
        $formatsurat->save();

        return redirect('/format_surat')->with('success_message', 'Surat' . $formatsurat->jenis_surat . 'berhasil dibuat');
    }

    /**
    * Untuk menampilkan formulir berdasarkan jenis surat yang dipilih oleh mahasiswa
    */
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
        else if($request->jenis_surat == "4"){
          // dd($request->jenis_surat);
          return view('mahasiswa.data_izin_studi_lapangan_1org', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "5"){
          return view('mahasiswa.data_izin_studi_lapangan_2org', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "6"){
          return view('mahasiswa.data_izin_studi_lapangan_3org', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "7"){
          return view('mahasiswa.data_izin_studi_lapangan_4org', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "8"){
          return view('mahasiswa.data_izin_studi_lapangan_5org', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "9"){
          return view('mahasiswa.data_izin_cuti_studi', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "10"){
          return view('mahasiswa.data_izin_pengunduran_diri', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "11"){
          return view('mahasiswa.data_perwakilan_perwalian_1mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "12"){
          return view('mahasiswa.data_perwakilan_perwalian_2mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "13"){
          return view('mahasiswa.data_perwakilan_perwalian_3mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "14"){
          return view('mahasiswa.data_perwakilan_perwalian_4mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "15"){
          return view('mahasiswa.data_perwakilan_perwalian_5mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "16"){
          return view('mahasiswa.data_perwakilan_perwalian_6mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "17"){
          return view('mahasiswa.data_perwakilan_perwalian_7mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "18"){
          return view('mahasiswa.data_perwakilan_perwalian_8mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "19"){
          return view('mahasiswa.data_perwakilan_perwalian_9mk', ['formatsurat_id' => $request->jenis_surat]);
        }
        else if($request->jenis_surat == "20"){
          return view('mahasiswa.data_perwakilan_perwalian_10mk', ['formatsurat_id' => $request->jenis_surat]);
        }
    }


}
