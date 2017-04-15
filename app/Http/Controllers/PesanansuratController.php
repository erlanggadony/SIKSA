<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PesanansuratRepository;
use App\Repositories\FormatsuratRepository;
use App\Repositories\MahasiswaRepository;
use App\Pesanansurat;
use App\Formatsurat;
use App\Mahasiswa;

class PesanansuratController extends Controller
{
    //
    protected $pesanansuratRepo;
    protected $formatsuratRepo;
    protected $mahasiswaRepo;

    public function __construct(PesanansuratRepository $pesanansuratRepo, FormatsuratRepository $formatsuratRepo, MahasiswaRepository $mahasiswaRepo){
      // dd($pesanansuratRepo);
        $this->pesanansuratRepo = $pesanansuratRepo;
        $this->formatsuratRepo = $formatsuratRepo;
        $this->mahasiswaRepo = $mahasiswaRepo;
        //dd($this->orders->getAllActive());
    }

    public function tampilkanPesananSurat(Request $request)
  	{
          //$confirmation = Confirmation::where(['id' => 2])->first();

          //dd($confirmation->order->tickets);
          //dd($confirmation);
          //--

          $pesanansurats;
          if($request->kategori == "jenis_surat"){
            $pesanansurats = $this->pesanansuratRepo->findMahasiswaByJenisSurat($request->searchBox);
          }
          else if($request->kategori == "perihal"){
            $pesanansurats = $this->pesanansuratRepo->findMahasiswaByPerihal($request->searchBox);
          }
          else if($request->kategori == "penerima_surat"){
            $pesanansurats = $this->pesanansuratRepo->findPesananSuratByPenerimaSurat($request->searchBox);
          }
          else if($request->kategori == "pengirimSurat"){
            $pesanansurats = $this->pesanansuratRepo->findMahasiswaByPengirimSurat($request->searchBox);
          }
          else if($request->kategori == "tanggalPembuatan"){
            $pesanansurats = $this->pesanansuratRepo->findMahasiswaByTanggalPembuatan($request->searchBox);
          }
          else{
            $pesanansurats = $this->pesanansuratRepo->findAllPesananSurat();
          }

          return view('TU.home_TU',[
              'pesanansurats' => $pesanansurats,
          ]);
  	}

    public function sendDataSurat(Request $request){
        $dataSurat = $request->prosesSurat;
            $json = json_decode($dataSurat);
            $nama = $json->nama;
            $prodi = $json->prodi;
            $npm = $json->npm;
            $semester = $json->semester;
            $thnAkademik = $json->thnAkademik;
            $jenisbeasiswa = $json->jenisbeasiswa;
            $formatsurat_id = $request->idFormatSurat;
            $format = file('format_surat_latex/surat_keterangan_beasiswa.tex');
            dd($format);
            return view('TU.proses_surat', [
                'nama' => $nama,
                'prodi' => $prodi,
                'npm' => $npm,
                'semester' => $semester,
                'thnAkademik' => $thnAkademik,
                'jenisbeasiswa' => $jenisbeasiswa,
                'formatsurat_id' => $formatsurat_id,
                'format' => $format
            ]);

    }

    public function store(Request $request)
    {
        $pesanansurat = new PesananSurat;

        $pesanansurat->mahasiswa_id = 'anonim';
        $pesanansurat->formatsurat_id = $request->idFormat;
        // dd($pesanansurat->formatsurats_id);
        $pesanansurat->dataSurat = $request->dataSurat;
        // dd($request);
        $pesanansurat->save();

        return redirect('/home_mahasiswa')->with('success_message', 'Surat' . $pesanansurat->formatsurats_id . 'berhasil dibuat');
    }
}
