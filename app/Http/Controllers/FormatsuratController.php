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

  /**
  * Menampilkan seluruh format surat di halaman format surat milik TU
  *
  * @return view
  */
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

      }
      else if($request->showFormatID == "10"){
          //
      }
      return json_encode($obj);
    }

    /**
    * Untuk menampilkan data yang telah diisikan pada formulir
    */
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

      }
      else if($request->showFormatID == "10"){
          //
      }
    }
}
