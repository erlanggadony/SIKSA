<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PesanansuratRepository;
use App\Repositories\HistorysuratRepository;
use App\Repositories\FormatsuratRepository;
use App\Mahasiswa;
use App\Formatsurat;
use App\Historysurat;
use Storage;

class HistorysuratController extends Controller
{
    //
    protected $historysuratRepo;
    protected $pesananSuratRepo;
    protected $formatSuratRepo;

    public function __construct(HistorysuratRepository $historysuratRepo, PesanansuratRepository $pesananSuratRepo, FormatsuratRepository $formatsuratRepo){
      // dd($formatsuratRepo);
        $this->historysuratRepo = $historysuratRepo;
        $this->pesananSuratRepo = $pesananSuratRepo;
        $this->formatsuratRepo = $formatsuratRepo;
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
      if($request->idFormatSurat == "1"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $prodi = $json->prodi;
        $npm = $json->npm;
        $semester = $json->semester;
        $thnAkademik = $json->thnAkademik;
        $penyediabeasiswa = $json->penyediabeasiswa;
        // $tanggal = $this->pesananSuratRepo->findPesananSuratById($request->id)->created_at;

        $entry = '\mailentry{' . $noSurat . ',' . $nama . ',' . $prodi . ',' . $npm . ',' . $semester . ',' . $thnAkademik . ',' . $penyediabeasiswa . '}';
        $fileTemplate = file('format_surat_latex/surat_keterangan_beasiswa.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/" . $nama . "_surat_keterangan_beasiswa.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -max-print-line=120 -interaction=nonstopmode -output-directory arsip_surat arsip_surat/' . $nama . '_surat_keterangan_beasiswa.tex');
        // fwrite($file, $stringFormat);
        // file_put_contents($file, $stringFormat);
        // $historysurat = new Historysurat;
        // $historysurat->perihal = $this->pesananSuratRepo->findPesananSuratById($request->id)->perihal;
        // $historysurat->penerimaSurat = $this->pesananSuratRepo->findPesananSuratById($request->id)->penerimaSurat;
        // $historysurat->pemohon = $this->pesananSuratRepo->findPesananSuratById($request->id)->perihal;
        // $historysurat->jenis_surat = $this->pesananSuratRepo->findPesananSuratById($request->id)->perihal;
        // $historysurat->link_arsip_surat =
        // $historysurat->penandatanganan =
        // $historysurat->pengambilan =
        // $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "2"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $prodi = $json->prodi;
        $npm = $json->npm;
        $kota_lahir = $json->kota_lahir;
        $tglLahir = $json->tglLahir;
        $alamat = $json->alamat;
        $semester = $json->semester;

        $entry = '\mailentry{' . $noSurat . ',' . $nama . ',' . $prodi . ',' . $npm . ',' . $kota_lahir . ',' . $tglLahir . ',' . $alamat . ',' . $semester . '}';
        $fileTemplate = file('format_surat_latex/surat_keterangan_mahasiswa_aktif.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_keterangan_mahasiswa_aktif.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "3"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $tglLahir = $json->tglLahir;
        $organisasiTujuan = $json->organisasiTujuan;
        $thnAkademik = $json->thnAkademik;
        $negaraTujuan = $json->negaraTujuan;
        $tanggalKunjungan = $json->tanggalKunjungan;

        $entry = '\mailentry{' . $noSurat . ',' . $nama . ',' . $tglLahir . ',' . $organisasiTujuan . ',' . $thnAkademik . ',' . $negaraTujuan . ',' . $tanggalKunjungan . '}';
        $fileTemplate = file('format_surat_latex/surat_pengantar_pembuatan_visa.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_pengantar_pembuatan_visa.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "4"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $npm = $json->npm;
        $prodi = $json->prodi;
        $matkul = $json->matkul;
        $topik = $json->topik;
        $organisasi = $json->organisasi;
        $alamatOrganisasi = $json->alamatOrganisasi;
        $keperluanKunjungan = $json->keperluanKunjungan;
        $namaAnggota = $json->namaAnggota;
        $npmAnggota = $json->npmAnggota;

        $entry = '\mailentry{' .
          $noSurat . ',' . $nama . ',' . $npm . ',' . $prodi . ',' . $matkul . ',' . $topik . ',' . $organisasi . ',' . $alamatOrganisasi . ',' . $keperluanKunjungan . ',' . $namaAnggota1 . ',' . $npmAnggota1 . ',' . '}';
        $fileTemplate = file('format_surat_latex/surat_pengantar_studi_lapangan_1orang.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_pengantar_studi_lapangan_1orang.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "5"){}
      else if($request->idFormatSurat == "6"){}
      else if($request->idFormatSurat == "7"){}
      else if($request->idFormatSurat == "8"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $npm = $json->npm;
        $prodi = $json->prodi;
        $matkul = $json->matkul;
        $topik = $json->topik;
        $organisasi = $json->organisasi;
        $alamatOrganisasi = $json->alamatOrganisasi;
        $keperluanKunjungan = $json->keperluanKunjungan;
        $namaAnggota1 = $json->namaAnggota1;
        $npmAnggota1 = $json->npmAnggota1;
        $namaAnggota2 = $json->namaAnggota2;
        $npmAnggota2 = $json->npmAnggota2;
        $namaAnggota3 = $json->namaAnggota3;
        $npmAnggota3 = $json->npmAnggota3;
        $namaAnggota4 = $json->namaAnggota4;
        $npmAnggota4 = $json->npmAnggota4;

        $entry = '\mailentry{' .
          $noSurat . ',' .
          $nama . ',' .
          $npm . ',' .
          $prodi . ',' .
          $matkul . ',' .
          $topik . ',' .
          $organisasi . ',' .
          $alamatOrganisasi . ',' .
          $keperluanKunjungan . ',' .
          $namaAnggota1 . ',' .
          $npmAnggota1 . ',' .
          $namaAnggota2 . ',' .
          $npmAnggota2 . ',' .
          $namaAnggota3 . ',' .
          $npmAnggota3 . ',' .
          $namaAnggota4 . ',' .
          $npmAnggota4 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_pengantar_studi_lapangan_5orang.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_pengantar_studi_lapangan_5orang.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "9"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $npm = $json->npm;
        $prodi = $json->prodi;
        $fakultas = $json->fakultas;
        $alamat = $json->alamat;
        $cutiStudiKe = $json->cutiStudiKe;
        $alasanCutiStudi = $json->alasanCutiStudi;
        $dosenWali = $json->dosenWali;
        $semester = $json->semester;
        $thnAkademik = $json->thnAkademik;

        $entry = '\mailentry{' .
          $noSurat . ',' .
          $nama . ',' .
          $npm . ',' .
          $prodi . ',' .
          $fakultas . ',' .
          $alamat . ',' .
          $cutiStudiKe . ',' .
          $alasanCutiStudi . ',' .
          $dosenWali . ',' .
          $semester . ',' .
          $thnAkademik . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_izin_cuti_studi.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_izin_cuti_studi.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "10"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $npm = $json->npm;
        $alamat = $json->alamat;
        $noTelepon = $json->noTelepon;
        $namaOrtu = $json->namaOrtu;
        $dosenWali = $json->dosenWali;
        $semester = $json->semester;

        $entry = '\mailentry{' . $noSurat . ',' . $nama . ',' . $npm . ',' . $alamat . ',' . $noTelepon . ',' . $namaOrtu . ',' . $dosenWali . ',' . $semester . ',' . '}';
        $fileTemplate = file('format_surat_latex/surat_pengunduran_diri.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_pengunduran_diri.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "11"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $prodi = $json->prodi;
        $npm = $json->npm;
        $namaWakil = $json->namaWakil;
        $prodiWakil = $json->prodiWakil;
        $npmWakil = $json->npmWakil;
        $dosenWali = $json->dosenWali;
        $alasan = $json->alasan;
        $matkul = $json->matkul;
        $sks = $json->sks;

        $entry = '\mailentry{' .
          $noSurat . ',' .
          $nama . ',' .
          $prodi . ',' .
          $npm . ',' .
          $namaWakil . ',' .
          $prodiWakil . ',' .
          $npmWakil . ',' .
          $dosenWali . ',' .
          $alasan . ',' .
          $matkul . ',' .
          $sks . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_1mk.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_perwakilan_perwalian_1mk.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
      else if($request->idFormatSurat == "12"){}
      else if($request->idFormatSurat == "13"){}
      else if($request->idFormatSurat == "14"){}
      else if($request->idFormatSurat == "15"){}
      else if($request->idFormatSurat == "16"){}
      else if($request->idFormatSurat == "17"){}
      else if($request->idFormatSurat == "18"){}
      else if($request->idFormatSurat == "19"){}
      else if($request->idFormatSurat == "20"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $prodi = $json->prodi;
        $npm = $json->npm;
        $namaWakil = $json->namaWakil;
        $prodiWakil = $json->prodiWakil;
        $npmWakil = $json->npmWakil;
        $dosenWali = $json->dosenWali;
        $alasan = $json->alasan;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $matkul6 = $json->matkul6;
        $sks6 = $json->sks6;
        $matkul7 = $json->matkul7;
        $sks7 = $json->sks7;
        $matkul8 = $json->matkul8;
        $sks8 = $json->sks8;
        $matkul9 = $json->matkul9;
        $sks9 = $json->sks9;
        $matkul10 = $json->matkul10;
        $sks10 = $json->sks10;

        $entry = '\mailentry{' .
          $noSurat . ',' .
          $nama . ',' .
          $prodi . ',' .
          $npm . ',' .
          $namaWakil . ',' .
          $prodiWakil . ',' .
          $npmWakil . ',' .
          $dosenWali . ',' .
          $alasan . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          $matkul6 . ',' .
          $sks6 . ',' .
          $matkul7 . ',' .
          $sks7 . ',' .
          $matkul8 . ',' .
          $sks8 . ',' .
          $matkul9 . ',' .
          $sks9 . ',' .
          $matkul10 . ',' .
          $sks10 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_10mk.tex');
        $stringFormat = "";
        $baris = count($fileTemplate);
        // dd($baris);
        foreach ($fileTemplate as $line_num => $line) {
            // dd($line);
            $stringFormat .= $line;
            if($line_num == $baris-3){
                $stringFormat .= $entry;
            }
        }
        // dd($stringFormat);
        $file = fopen("arsip_surat/surat_perwakilan_perwalian_10mk.tex", "w");
        fwrite($file, $stringFormat);
        shell_exec('pdflatex "F:\Skripsi\Source code Skripsi\SIKSA\public\arsip_surat"');
      }
  }
}
