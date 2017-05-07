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
use Illuminate\Support\Facades\Auth;
use App\Dosen;
use App\User;
use App\TU;
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

    public function tampilkanHistoryDiPejabat(Request $request){
          $historysurats;
          if($request->kategori_history_surat == "noSurat"){
            $historysurats = $this->historysuratRepo->findHistorySuratByNomorSurat($request->searchBox);
          }
          else if($request->kategori_history_surat == "jenis_surat"){
            $historysurats = $this->historysuratRepo->findHistoryByJenisSurat($request->searchBox);
          }
          else if($request->kategori_history_surat == "perihal"){
            $historysurats = $this->historysuratRepo->findHistoryByPerihal($request->searchBox);
          }
          else if($request->kategori_history_surat == "penerima_surat"){
            $historysurats = $this->historysuratRepo->findHistorySuratByPenerimaSurat($request->searchBox);
          }
          else if($request->kategori_history_surat == "pengirimSurat"){
            $historysurats = $this->historysuratRepo->findHistoryByPengirimSurat($request->searchBox);
          }
          else if($request->kategori_history_surat == "tanggalPembuatan"){
            $historysurats = $this->historysuratRepo->findHistoryByTanggalPembuatan($request->searchBox);
          }
          else{
            $historysurats = $this->historysuratRepo->findAllHistorysurat();
          }
          // dd($formatsurats);
          $loggedInUser = Auth::user();
          $realUser = $this->getRealUser($loggedInUser);
          return view('pejabat.history_pejabat', [
            'historysurats' => $historysurats,
            'user' => $realUser
          ]);
  	}

    public function tampilkanProfil(){
      $loggedInUser = Auth::user();
      // dd($loggedInUser);
      $realUser = $this->getRealUser($loggedInUser);
      // dd($realUser);
      // dd($realUser->historysurats);
      $histories = $realUser->historysurats;
      // dd($histories);
      // $jenis = $this->historysuratRepo->findHistoryById($history->id)
      // dd($history);
      $foto = $realUser->foto_mahasiswa;
      // dd($foto);
      return view('mahasiswa.home_mahasiswa',[
        'user' => $realUser,
        'historysurats' => $histories
      ]);
    }

    public function ubahStatusPengambilan(Request $request){
      $history = $this->historysuratRepo->findHistoryById($request->id);
      // dd($history);
      $history->pengambilan = true;
      $history->save();
      return redirect('/history_TU');
    }

    public function ubahStatusPenandatanganan(Request $request){
      $history = $this->historysuratRepo->findHistoryById($request->id);
      $history->penandatanganan = true;
      $history->save();
      return redirect('/history_pejabat');
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

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function pilihHistorySurat(Request $request){
        $historysurats;
        if($request->kategori_history_surat == "noSurat"){
          $historysurats = $this->historysuratRepo->findHistorySuratByNomorSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "jenis_surat"){
          $historysurats = $this->historysuratRepo->findHistoryByJenisSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "perihal"){
          $historysurats = $this->historysuratRepo->findHistoryByPerihal($request->searchBox);
        }
        else if($request->kategori_history_surat == "penerima_surat"){
          $historysurats = $this->historysuratRepo->findHistorySuratByPenerimaSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "pengirimSurat"){
          $historysurats = $this->historysuratRepo->findHistoryByPengirimSurat($request->searchBox);
        }
        else if($request->kategori_history_surat == "tanggalPembuatan"){
          $historysurats = $this->historysuratRepo->findHistoryByTanggalPembuatan($request->searchBox);
        }
        else{
          $historysurats = $this->historysuratRepo->findAllHistorysurat();
        }
        // dd($formatsurats);
        $loggedInUser = Auth::user();
        $realUser = $this->getRealUser($loggedInUser);
        $foto = $realUser->foto_mahasiswa;
        return view('TU.history_TU', [
          'historysurats' => $historysurats,
          'user' => $realUser,
          'foto' => $foto
        ]);
	}

  public function buatPDF(Request $request){
      $loggedInUser = Auth::user();
      $realUser = $this->getRealUser($loggedInUser);
      if($request->idFormatSurat == "1"){
        $dataSurat = $request->data;
        $json = json_decode($dataSurat);
        $noSurat = $request->noSurat;
        $nama = $json->nama;
        $prodi = $this->prodiRepo->findProdiById($json->prodi);
        $npm = $json->npm;
        $semester = $json->semester;
        $thnAkademik = $json->thnAkademik;
        $penyediabeasiswa = $json->penyediabeasiswa;
        $pemesan = $request->pemesan;
        // $tanggal = $this->pesananSuratRepo->findHistorySuratById($request->id)->created_at;

        $entry = '\mailentry{' . $noSurat . ',' . $nama . ',' . $prodi . ',' . $npm . ',' . $semester . ',' . $thnAkademik . ',' . $penyediabeasiswa . '}';
        // dd($entry);
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_keterangan_beasiswa.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat. '_' . $npm . '_surat_keterangan_beasiswa.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = $json->penyediabeasiswa;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_keterangan_beasiswa.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');//->with('success_message', 'Surat berhasil dibuat!');
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
        $pemesan = $request->pemesan;

        //input entry
        $entry = '\mailentry{' . $noSurat . ',' . $nama . ',' . $prodi . ',' . $npm . ',' . $kota_lahir . ',' . $tglLahir . ',' . $alamat . ',' . $semester . '}';
        // dd($entry);
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
        //inject ke file baru
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_keterangan_mahasiswa_aktif.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_keterangan_mahasiswa_aktif.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = $nama;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_keterangan_mahasiswa_aktif.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
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
        $pemesan = $request->pemesan;
        $npm = $this->mahasiswaRepo->findMahasiswaById($pemesan);

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

        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengantar_pembuatan_visa.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengantar_pembuatan_visa.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'APPLICATION FOR VISA SCHENGEN';
        $historysurat->penerimaSurat = $organisasiTujuan;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengantar_pembuatan_visa.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
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
        $kepada = $json->kepada;
        $kota = $json->kota;
        $keperluanKunjungan = $json->keperluanKunjungan;
        $pemesan = $request->pemesan;

        $entry = '\mailentry{' .
          $noSurat . ',' . $nama . ',' . $npm . ',' . $prodi . ',' . $matkul . ',' . $topik . ',' . $organisasi . ',' . $alamatOrganisasi . ',' . $keperluanKunjungan . ',' .$kota . ',' . $kepada . ',' . '}';
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengantar_studi_lapangan_1orang.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengantar_studi_lapangan_1orang.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Permohonan' . $keperluanKunjungan;
        $historysurat->penerimaSurat = $kepada;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengantar_studi_lapangan_1orang.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "5"){
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
        $kepada = $json->kepada;
        $kota = $json->kota;
        $namaAnggota = $json->namaAnggota;
        $npmAnggota = $json->npmAnggota;
        $pemesan = $request->pemesan;

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
          $kota . ',' .
          $kepada . ',' .
          $namaAnggota . ',' .
          $npmAnggota . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_pengantar_studi_lapangan_2orang.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengantar_studi_lapangan_2orang.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengantar_studi_lapangan_2orang.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Permohonan' . $keperluanKunjungan;
        $historysurat->penerimaSurat = $kepada;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengantar_studi_lapangan_2orang.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "6"){
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
        $kepada = $json->kepada;
        $kota = $json->kota;
        $namaAnggota1 = $json->namaAnggota1;
        $npmAnggota1 = $json->npmAnggota1;
        $namaAnggota2 = $json->namaAnggota2;
        $npmAnggota2 = $json->npmAnggota2;
        $pemesan = $request->pemesan;

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
          $kota . ',' .
          $kepada . ',' .
          $namaAnggota1 . ',' .
          $npmAnggota1 . ',' .
          $namaAnggota2 . ',' .
          $npmAnggota2 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_pengantar_studi_lapangan_3orang.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengantar_studi_lapangan_3orang.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengantar_studi_lapangan_3orang.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Permohonan' . $keperluanKunjungan;
        $historysurat->penerimaSurat = $kepada;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengantar_studi_lapangan_3orang.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "7"){
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
        $kepada = $json->kepada;
        $kota = $json->kota;
        $namaAnggota1 = $json->namaAnggota1;
        $npmAnggota1 = $json->npmAnggota1;
        $namaAnggota2 = $json->namaAnggota2;
        $npmAnggota2 = $json->npmAnggota2;
        $namaAnggota3 = $json->namaAnggota3;
        $npmAnggota3 = $json->npmAnggota3;
        $pemesan = $request->pemesan;

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
          $kota . ',' .
          $kepada . ',' .
          $namaAnggota1 . ',' .
          $npmAnggota1 . ',' .
          $namaAnggota2 . ',' .
          $npmAnggota2 . ',' .
          $namaAnggota3 . ',' .
          $npmAnggota3 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_pengantar_studi_lapangan_4orang.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengantar_studi_lapangan_4orang.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengantar_studi_lapangan_4orang.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Permohonan' . $keperluanKunjungan;
        $historysurat->penerimaSurat = $kepada;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengantar_studi_lapangan_4orang.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
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
        $kepada = $json->kepada;
        $kota = $json->kota;
        $namaAnggota1 = $json->namaAnggota1;
        $npmAnggota1 = $json->npmAnggota1;
        $namaAnggota2 = $json->namaAnggota2;
        $npmAnggota2 = $json->npmAnggota2;
        $namaAnggota3 = $json->namaAnggota3;
        $npmAnggota3 = $json->npmAnggota3;
        $namaAnggota4 = $json->namaAnggota4;
        $npmAnggota4 = $json->npmAnggota4;
        $pemesan = $request->pemesan;

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
          $kota . ',' .
          $kepada . ',' .
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengantar_studi_lapangan_5orang.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengantar_studi_lapangan_5orang.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Permohonan' . $keperluanKunjungan;
        $historysurat->penerimaSurat = $kepada;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengantar_studi_lapangan_5orang.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
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
        $pemesan = $request->pemesan;

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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_izin_cuti_studi.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_izin_cuti_studi.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Surat Ijin Berhenti Studi Sementara';
        $historysurat->penerimaSurat = $nama;
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $nama . '_surat_izin_cuti_studi.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
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
        $pemesan = $request->pemesan;

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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_pengunduran_diri.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_pengunduran_diri.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = 'Pengunduran diri';
        $historysurat->penerimaSurat = 'Rektor';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_pengunduran_diri.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
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
        $kodeMK = $json->kodeMK;
        $matkul = $json->matkul;
        $sks = $json->sks;
        $pemesan = $request->pemesan;

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
          $kodeMK . ',' .
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_1mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_1mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_1mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "12"){
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
        $pemesan = $request->pemesan;

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
          $kodeMK1 = $json->kodeMK1;
          $matkul1 = $json->matkul1;
          $sks1 = $json->sks1;
          $kodeMK2 = $json->kodeMK2;
          $matkul2 = $json->matkul2;
          $sks2 = $json->sks2;
          $pemesan = $request->pemesan;

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
            $kodeMK1 . ',' .
            $matkul1 . ',' .
            $sks1 . ',' .
            $kodeMK2 . ',' .
            $matkul2 . ',' .
            $sks2 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_2mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_2mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_2mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_2mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "13"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_3mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_3mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_3mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_3mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "14"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_4mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_4mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_4mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_4mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "15"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $kodeMK5 = $json->kodeMK5;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $kodeMK5 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_5mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_5mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_5mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_5mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "16"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $kodeMK5 = $json->kodeMK5;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $kodeMK6 = $json->kodeMK6;
        $matkul6 = $json->matkul6;
        $sks6 = $json->sks6;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $kodeMK5 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          $kodeMK6 . ',' .
          $matkul6 . ',' .
          $sks6 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_6mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_6mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_6mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_6mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "17"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $kodeMK5 = $json->kodeMK5;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $kodeMK6 = $json->kodeMK6;
        $matkul6 = $json->matkul6;
        $sks6 = $json->sks6;
        $kodeMK7 = $json->kodeMK7;
        $matkul7 = $json->matkul7;
        $sks7 = $json->sks7;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $kodeMK5 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          $kodeMK6 . ',' .
          $matkul6 . ',' .
          $sks6 . ',' .
          $kodeMK7 . ',' .
          $matkul7 . ',' .
          $sks7 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_7mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_7mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_7mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_7mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "18"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $kodeMK5 = $json->kodeMK5;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $kodeMK6 = $json->kodeMK6;
        $matkul6 = $json->matkul6;
        $sks6 = $json->sks6;
        $kodeMK7 = $json->kodeMK7;
        $matkul7 = $json->matkul7;
        $sks7 = $json->sks7;
        $kodeMK8 = $json->kodeMK8;
        $matkul8 = $json->matkul8;
        $sks8 = $json->sks8;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $kodeMK5 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          $kodeMK6 . ',' .
          $matkul6 . ',' .
          $sks6 . ',' .
          $kodeMK7 . ',' .
          $matkul7 . ',' .
          $sks7 . ',' .
          $kodeMK8 . ',' .
          $matkul8 . ',' .
          $sks8 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_8mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_8mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_8mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_8mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
      else if($request->idFormatSurat == "19"){
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $kodeMK5 = $json->kodeMK5;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $kodeMK6 = $json->kodeMK6;
        $matkul6 = $json->matkul6;
        $sks6 = $json->sks6;
        $kodeMK7 = $json->kodeMK7;
        $matkul7 = $json->matkul7;
        $sks7 = $json->sks7;
        $kodeMK8 = $json->kodeMK8;
        $matkul8 = $json->matkul8;
        $sks8 = $json->sks8;
        $kodeMK9 = $json->kodeMK9;
        $matkul9 = $json->matkul9;
        $sks9 = $json->sks9;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $kodeMK5 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          $kodeMK6 . ',' .
          $matkul6 . ',' .
          $sks6 . ',' .
          $kodeMK7 . ',' .
          $matkul7 . ',' .
          $sks7 . ',' .
          $kodeMK8 . ',' .
          $matkul8 . ',' .
          $sks8 . ',' .
          $kodeMK9 . ',' .
          $matkul9 . ',' .
          $sks9 . ',' .
          '}';
        $fileTemplate = file('format_surat_latex/surat_perwakilan_perwalian_9mk.tex');
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_9mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_9mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_9mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
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
        $kodeMK1 = $json->kodeMK1;
        $matkul1 = $json->matkul1;
        $sks1 = $json->sks1;
        $kodeMK2 = $json->kodeMK2;
        $matkul2 = $json->matkul2;
        $sks2 = $json->sks2;
        $kodeMK3 = $json->kodeMK3;
        $matkul3 = $json->matkul3;
        $sks3 = $json->sks3;
        $kodeMK4 = $json->kodeMK4;
        $matkul4 = $json->matkul4;
        $sks4 = $json->sks4;
        $kodeMK5 = $json->kodeMK5;
        $matkul5 = $json->matkul5;
        $sks5 = $json->sks5;
        $kodeMK6 = $json->kodeMK6;
        $matkul6 = $json->matkul6;
        $sks6 = $json->sks6;
        $kodeMK7 = $json->kodeMK7;
        $matkul7 = $json->matkul7;
        $sks7 = $json->sks7;
        $kodeMK8 = $json->kodeMK8;
        $matkul8 = $json->matkul8;
        $sks8 = $json->sks8;
        $kodeMK9 = $json->kodeMK9;
        $matkul9 = $json->matkul9;
        $sks9 = $json->sks9;
        $kodeMK10 = $json->kodeMK10;
        $matkul10 = $json->matkul10;
        $sks10 = $json->sks10;
        $pemesan = $request->pemesan;

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
          $kodeMK1 . ',' .
          $matkul1 . ',' .
          $sks1 . ',' .
          $kodeMK2 . ',' .
          $matkul2 . ',' .
          $sks2 . ',' .
          $kodeMK3 . ',' .
          $matkul3 . ',' .
          $sks3 . ',' .
          $kodeMK4 . ',' .
          $matkul4 . ',' .
          $sks4 . ',' .
          $kodeMK5 . ',' .
          $matkul5 . ',' .
          $sks5 . ',' .
          $kodeMK6 . ',' .
          $matkul6 . ',' .
          $sks6 . ',' .
          $kodeMK7 . ',' .
          $matkul7 . ',' .
          $sks7 . ',' .
          $kodeMK8 . ',' .
          $matkul8 . ',' .
          $sks8 . ',' .
          $kodeMK9 . ',' .
          $matkul9 . ',' .
          $sks9 . ',' .
          $kodeMK10 . ',' .
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
        $file = fopen("arsip_surat/" . $noSurat. "_" . $npm . "_surat_perwakilan_perwalian_10mk.tex", "w");
        fwrite($file, $stringFormat);
        fclose($file);
        shell_exec('pdflatex -output-directory arsip_surat arsip_surat/' . $noSurat . '_' . $npm . '_surat_perwakilan_perwalian_10mk.tex');

        //store to db
        $historysurat = new Historysurat;
        $historysurat->no_surat = $noSurat;
        $historysurat->perihal = '-';
        $historysurat->penerimaSurat = '-';
        $historysurat->mahasiswa_id = $pemesan;
        $historysurat->formatsurats_id = $request->idFormatSurat;
        $historysurat->link_arsip_surat = '127.0.0.1:8000/arsip_surat/' . $noSurat. '_' . $npm . '_surat_perwakilan_perwalian_10mk.pdf';
        $historysurat->penandatanganan = false;
        $historysurat->pengambilan = false;
        $historysurat->save();
        return redirect('/history_TU');
      }
  }
}
