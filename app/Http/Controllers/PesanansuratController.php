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
    public function tampilkanPesananSurat(Request $request){
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
        // dd($dataSurat);
        return view('TU.proses_surat', [
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
    public function store(Request $request){
        $pesanansurat = new PesananSurat;
        $pesanansurat->mahasiswa_id = 'anonim';
        $pesanansurat->formatsurat_id = $request->idFormat;
        // dd($pesanansurat->formatsurats_id);
        $pesanansurat->dataSurat = $request->dataSurat;
        // dd($request);
        $pesanansurat->save();
        return redirect('/home_mahasiswa')->with('success_message', 'Surat' . $pesanansurat->formatsurats_id . 'berhasil dibuat');
    }

    /**
    * Untuk meng-generate JSON dari data input
    */
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
      else if($request->jenis_surat == "4"){
          $obj = [
            'nama' => $request->nama,
            'npm' => $request->npm,
            'prodi' => $request->prodi,
            'matkul' => $request->matkul,
            'topik' => $request->topik,
            'organisasi' => $request->organisasi,
            'alamatOrganisasi' => $request->alamatOrganisasi,
            'keperluanKunjungan' => $request->keperluanKunjungan,
          ];
      }
      else if($request->jenis_surat == "5"){
        $obj = [
          'nama' => $request->nama,
          'npm' => $request->npm,
          'prodi' => $request->prodi,
          'matkul' => $request->matkul,
          'topik' => $request->topik,
          'organisasi' => $request->organisasi,
          'alamatOrganisasi' => $request->alamatOrganisasi,
          'keperluanKunjungan' => $request->keperluanKunjungan,
          'namaAnggota' => $request->namaAnggota,
          'npmAnggota' => $request->npmAnggota,
        ];
      }
      else if($request->jenis_surat == "6"){
        $obj = [
          'nama' => $request->nama,
          'npm' => $request->npm,
          'prodi' => $request->prodi,
          'matkul' => $request->matkul,
          'topik' => $request->topik,
          'organisasi' => $request->organisasi,
          'alamatOrganisasi' => $request->alamatOrganisasi,
          'keperluanKunjungan' => $request->keperluanKunjungan,
          'namaAnggota1' => $request->namaAnggota1,
          'npmAnggota1' => $request->npmAnggota1,
          'namaAnggota2' => $request->namaAnggota2,
          'npmAnggota2' => $request->npmAnggota2
        ];
      }
      else if($request->jenis_surat == "7"){
        $obj = [
          'nama' => $request->nama,
          'npm' => $request->npm,
          'prodi' => $request->prodi,
          'matkul' => $request->matkul,
          'topik' => $request->topik,
          'organisasi' => $request->organisasi,
          'alamatOrganisasi' => $request->alamatOrganisasi,
          'keperluanKunjungan' => $request->keperluanKunjungan,
          'namaAnggota1' => $request->namaAnggota1,
          'npmAnggota1' => $request->npmAnggota1,
          'namaAnggota2' => $request->namaAnggota2,
          'npmAnggota2' => $request->npmAnggota2,
          'namaAnggota3' => $request->namaAnggota3,
          'npmAnggota3' => $request->npmAnggota3
        ];
      }
      else if($request->jenis_surat == "8"){
        $obj = [
          'nama' => $request->nama,
          'npm' => $request->npm,
          'prodi' => $request->prodi,
          'matkul' => $request->matkul,
          'topik' => $request->topik,
          'organisasi' => $request->organisasi,
          'alamatOrganisasi' => $request->alamatOrganisasi,
          'keperluanKunjungan' => $request->keperluanKunjungan,
          'namaAnggota1' => $request->namaAnggota1,
          'npmAnggota1' => $request->npmAnggota1,
          'namaAnggota2' => $request->namaAnggota2,
          'npmAnggota2' => $request->npmAnggota2,
          'namaAnggota3' => $request->namaAnggota3,
          'npmAnggota3' => $request->npmAnggota3,
          'namaAnggota4' => $request->namaAnggota4,
          'npmAnggota4' => $request->npmAnggota4
        ];
      }
      else if($request->jenis_surat == "9"){
        $obj = [
          'nama' => $request->nama,
          'npm' => $request->npm,
          'prodi' => $request->prodi,
          'fakultas' => $request->fakultas,
          'alamat' => $request->alamat,
          'cutiStudiKe' => $request->cutiStudiKe,
          'alasanCutiStudi' => $request->alasanCutiStudi,
          'dosenWali' => $request->dosenWali,
          'semester' => $request->semester,
          'thnAkademik' => $request->thnAkademik,
          'persetujuanDosenWali' => $request->persetujuanDosenWali,
          'catatanDosenWali' => $request->catatanDosenWali,
          'persetujuanKaprodi' => $request->persetujuanKaprodi,
          'catatanKaprodi' => $request->catatanKaprodi,
          'persetujuanWDII' => $request->persetujuanWDII,
          'catatanWDII' => $request->catatanWDII,
          'persetujuanWDI' => $request->persetujuanWDI,
          'catatanWDI' => $request->catatanWDI,
          'persetujuanDekan' => $request->persetujuanDekan
        ];
      }
      else if($request->jenis_surat == "10"){
        $obj = [
          'nama' => $request->nama,
          'npm' => $request->npm,
          'alamat' => $request->alamat,
          'noTelepon' => $request->noTelepon,
          'namaOrtu' => $request->namaOrtu,
          'dosenWali' => $request->dosenWali,
          'semester' => $request->semester,
          'persetujuanDosenWali' => $request->persetujuanDosenWali,
          'catatanDosenWali' => $request->catatanDosenWali,
          'persetujuanKaprodi' => $request->persetujuanKaprodi,
          'catatanKaprodi' => $request->catatanKaprodi,
          'persetujuanWDII' => $request->persetujuanWDII,
          'catatanWDII' => $request->catatanWDII,
          'persetujuanWDI' => $request->persetujuanWDI,
          'catatanWDI' => $request->catatanWDI,
          'persetujuanDekan' => $request->persetujuanDekan
        ];
      }
      return json_encode($obj);
    }
    /**
    * Untuk menampilkan data yang telah diisikan pada formulir
    */
    public function tampilkanPreview(Request $request){
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
      else if($request->jenis_surat == "4"){
        $nama = $request->nama;
        $npm = $request->npm;
        $prodi = $request->prodi;
        $matkul = $request->matkul;
        $topik = $request->topik;
        $organisasi = $request->organisasi;
        $alamatOrganisasi = $request->alamatOrganisasi;
        $keperluanKunjungan = $request->keperluanKunjungan;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        // dd($request);
        return view('mahasiswa.preview_izin_studi_lapangan_1org', [
            'nama' => $nama,
            'npm' => $npm,
            'prodi' => $prodi,
            'matkul' => $matkul,
            'topik' => $topik,
            'organisasi' => $organisasi,
            'alamatOrganisasi' => $alamatOrganisasi,
            'keperluanKunjungan' => $keperluanKunjungan,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "5"){
        $nama = $request->nama;
        $npm = $request->npm;
        $prodi = $request->prodi;
        $matkul = $request->matkul;
        $topik = $request->topik;
        $organisasi = $request->organisasi;
        $alamatOrganisasi = $request->alamatOrganisasi;
        $keperluanKunjungan = $request->keperluanKunjungan;
        $namaAnggota = $request->namaAnggota;
        $npmAnggota = $request->npmAnggota;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        return view('mahasiswa.preview_izin_studi_lapangan_2org', [
            'nama' => $nama,
            'npm' => $npm,
            'prodi' => $prodi,
            'matkul' => $matkul,
            'topik' => $topik,
            'organisasi' => $organisasi,
            'alamatOrganisasi' => $alamatOrganisasi,
            'keperluanKunjungan' => $keperluanKunjungan,
            'namaAnggota' => $namaAnggota,
            'npmAnggota' => $npmAnggota,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "6"){
        $nama = $request->nama;
        $npm = $request->npm;
        $prodi = $request->prodi;
        $matkul = $request->matkul;
        $topik = $request->topik;
        $organisasi = $request->organisasi;
        $alamatOrganisasi = $request->alamatOrganisasi;
        $keperluanKunjungan = $request->keperluanKunjungan;
        $namaAnggota1 = $request->namaAnggota1;
        $npmAnggota1 = $request->npmAnggota1;
        $namaAnggota2 = $request->namaAnggota2;
        $npmAnggota2 = $request->npmAnggota2;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        return view('mahasiswa.preview_izin_studi_lapangan_3org', [
            'nama' => $nama,
            'npm' => $npm,
            'prodi' => $prodi,
            'matkul' => $matkul,
            'topik' => $topik,
            'organisasi' => $organisasi,
            'alamatOrganisasi' => $alamatOrganisasi,
            'keperluanKunjungan' => $keperluanKunjungan,
            'namaAnggota1' => $namaAnggota1,
            'npmAnggota1' => $npmAnggota1,
            'namaAnggota2' => $namaAnggota2,
            'npmAnggota2' => $npmAnggota2,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "7"){
        $nama = $request->nama;
        $npm = $request->npm;
        $prodi = $request->prodi;
        $matkul = $request->matkul;
        $topik = $request->topik;
        $organisasi = $request->organisasi;
        $alamatOrganisasi = $request->alamatOrganisasi;
        $keperluanKunjungan = $request->keperluanKunjungan;
        $namaAnggota1 = $request->namaAnggota1;
        $npmAnggota1 = $request->npmAnggota1;
        $namaAnggota2 = $request->namaAnggota2;
        $npmAnggota2 = $request->npmAnggota2;
        $namaAnggota3 = $request->namaAnggota3;
        $npmAnggota3 = $request->npmAnggota3;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        return view('mahasiswa.preview_izin_studi_lapangan_4org', [
            'nama' => $nama,
            'npm' => $npm,
            'prodi' => $prodi,
            'matkul' => $matkul,
            'topik' => $topik,
            'organisasi' => $organisasi,
            'alamatOrganisasi' => $alamatOrganisasi,
            'keperluanKunjungan' => $keperluanKunjungan,
            'namaAnggota1' => $namaAnggota1,
            'npmAnggota1' => $npmAnggota1,
            'namaAnggota2' => $namaAnggota2,
            'npmAnggota2' => $npmAnggota2,
            'namaAnggota3' => $namaAnggota3,
            'npmAnggota3' => $npmAnggota3,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "8"){
        $nama = $request->nama;
        $npm = $request->npm;
        $prodi = $request->prodi;
        $matkul = $request->matkul;
        $topik = $request->topik;
        $organisasi = $request->organisasi;
        $alamatOrganisasi = $request->alamatOrganisasi;
        $keperluanKunjungan = $request->keperluanKunjungan;
        $namaAnggota1 = $request->namaAnggota1;
        $npmAnggota1 = $request->npmAnggota1;
        $namaAnggota2 = $request->namaAnggota2;
        $npmAnggota2 = $request->npmAnggota2;
        $namaAnggota3 = $request->namaAnggota3;
        $npmAnggota3 = $request->npmAnggota3;
        $namaAnggota4 = $request->namaAnggota4;
        $npmAnggota4 = $request->npmAnggota4;
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        return view('mahasiswa.preview_izin_studi_lapangan_5org', [
            'nama' => $nama,
            'npm' => $npm,
            'prodi' => $prodi,
            'matkul' => $matkul,
            'topik' => $topik,
            'organisasi' => $organisasi,
            'alamatOrganisasi' => $alamatOrganisasi,
            'keperluanKunjungan' => $keperluanKunjungan,
            'namaAnggota1' => $namaAnggota1,
            'npmAnggota1' => $npmAnggota1,
            'namaAnggota2' => $namaAnggota2,
            'npmAnggota2' => $npmAnggota2,
            'namaAnggota3' => $namaAnggota3,
            'npmAnggota3' => $npmAnggota3,
            'namaAnggota4' => $namaAnggota4,
            'npmAnggota4' => $npmAnggota4,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "9"){
        $nama = $request->nama;
        $npm = $request->npm;
        $prodi = $request->prodi;
        $fakultas = $request->fakultas;
        $alamat = $request->alamat;
        $cutiStudiKe = $request->cutiStudiKe;
        $alasanCutiStudi = $request->alasanCutiStudi;
        $dosenWali = $request->dosenWali;
        $semester = $request->semester;
        $thnAkademik = $request->thnAkademik;
        //upload
        // $lampiran = $request->file('lampiran_CutiStudi');
        // $destination_path = ('lampiran/cuti_studi/');
        // $filename = $lampiran->getClientOriginalName();
        // $namaDepan = explode(" ", $nama);
        // $savedLampiran = ($namaDepan[0] . '_' . $namaDepan[1] . '_' .$filename);
        // $lampiran->move($destination_path, $savedLampiran);

        // $link = '127.0.0.1:8000/format_surat_latex/' . $filename;
        $persetujuanDosenWali = '-';
        $catatanDosenWali = '-';
        $persetujuanKaprodi = '-';
        $catatanKaprodi = '-';
        $persetujuanWDII = '-';
        $catatanWDII = '-';
        $persetujuanWDI = '-';
        $catatanWDI = '-';
        $persetujuanDekan = '-';
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        return view('mahasiswa.preview_izin_cuti_studi', [
            'nama' => $nama,
            'npm' => $npm,
            'prodi' => $prodi,
            'fakultas' => $fakultas,
            'alamat' => $alamat,
            'cutiStudiKe' => $cutiStudiKe,
            'alasanCutiStudi' => $alasanCutiStudi,
            'dosenWali' => $dosenWali,
            'semester' => $semester,
            'thnAkademik' => $thnAkademik,
            'persetujuanDosenWali' => $persetujuanDosenWali,
            'catatanDosenWali' => $catatanDosenWali,
            'persetujuanKaprodi' => $persetujuanKaprodi,
            'catatanKaprodi' => $catatanKaprodi,
            'persetujuanWDII' => $persetujuanWDII,
            'catatanWDII' => $catatanWDII,
            'persetujuanWDI' => $persetujuanWDI,
            'catatanWDI' => $catatanWDI,
            'persetujuanDekan' => $persetujuanDekan,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
      else if($request->jenis_surat == "10"){
        $nama = $request->nama;
        $npm = $request->npm;
        $alamat = $request->alamat;
        $noTelepon = $request->noTelepon;
        $namaOrtu = $request->namaOrtu;
        $dosenWali = $request->dosenWali;
        $semester = $request->semester;
        //upload
        // $lampiran = $request->file('lampiran_CutiStudi');
        // $destination_path = ('lampiran/cuti_studi/');
        // $filename = $lampiran->getClientOriginalName();
        // $namaDepan = explode(" ", $nama);
        // $savedLampiran = ($namaDepan[0] . '_' . $namaDepan[1] . '_' .$filename);
        // $lampiran->move($destination_path, $savedLampiran);

        // $link = '127.0.0.1:8000/format_surat_latex/' . $filename;
        $persetujuanDosenWali = '-';
        $catatanDosenWali = '-';
        $persetujuanKaprodi = '-';
        $catatanKaprodi = '-';
        $persetujuanWDII = '-';
        $catatanWDII = '-';
        $persetujuanWDI = '-';
        $catatanWDI = '-';
        $persetujuanDekan = '-';
        $formatsurat_id = $request->jenis_surat;
        $dataSurat = $this->buatJSON($request);
        return view('mahasiswa.preview_izin_pengunduran_diri', [
            'nama' => $nama,
            'npm' => $npm,
            'alamat' => $alamat,
            'noTelepon' => $noTelepon,
            'namaOrtu' => $namaOrtu,
            'dosenWali' => $dosenWali,
            'semester' => $semester,
            'persetujuanDosenWali' => $persetujuanDosenWali,
            'catatanDosenWali' => $catatanDosenWali,
            'persetujuanKaprodi' => $persetujuanKaprodi,
            'catatanKaprodi' => $catatanKaprodi,
            'persetujuanWDII' => $persetujuanWDII,
            'catatanWDII' => $catatanWDII,
            'persetujuanWDI' => $persetujuanWDI,
            'catatanWDI' => $catatanWDI,
            'persetujuanDekan' => $persetujuanDekan,
            'formatsurat_id' => $formatsurat_id,
            'dataSurat' => $dataSurat
        ]);
      }
    }
}
