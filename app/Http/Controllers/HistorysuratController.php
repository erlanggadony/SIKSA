<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HistorysuratRepository;
use App\Historysurat;

class HistorysuratController extends Controller
{
    //
    protected $historysuratRepo;

    public function __construct(HistorysuratRepository $historysuratRepo){
      // dd($formatsuratRepo);
        $this->historysuratRepo = $historysuratRepo;
        //dd($this->orders->getAllActive());
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function pilihHistorySurat(Request $request)
	{
        //$confirmation = Confirmation::where(['id' => 2])->first();

        //dd($confirmation->order->tickets);
        //dd($confirmation);
        //--

        $historysurats;
        if($request->kategori_history_surat == "noSurat"){
          $historysurats = $this->historysuratRepo->findPesananSuratByNomorSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "jenis_surat"){
          $historysurats = $this->historysuratRepo->findMahasiswaByJenisSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "perihal"){
          $historysurats = $this->historysuratRepo->findMahasiswaByPerihal($request->searchBox);
        }
        else if($request->kategori_history_surat == "penerima_surat"){
          $historysurats = $this->historysuratRepo->findPesananSuratByPenerimaSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "pengirimSurat"){
          $historysurats = $this->historysuratRepo->findMahasiswaByPengirimSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "tanggalPembuatan"){
          $historysurats = $this->historysuratRepo->findMahasiswaByTanggalPembuatan($request->searchBox);
        }
        else{
          $historysurats = $this->historysuratRepo->findAllFormatsurat();
        }
        // dd($formatsurats);
        return view('TU.history',[
            'historysurats' => $historysurats,
        ]);
	}

  public function buatPDF(Request $request){
    $format = file('format_surat_latex/surat_keterangan_beasiswa.tex');
    // dd($format);

  }
}
