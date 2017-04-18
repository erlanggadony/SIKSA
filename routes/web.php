<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'Api'], function(){
    Route::get('/showFormatSurat', 'Api\FormatsuratAPIController@tampilkanFormat');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('mahasiswa/test');
});
Route::get('/login_mahasiswa', function () {
    return view('mahasiswa/login_mahasiswa');
});
Route::post('/login', 'AuthController@authenticate');
//<-------------------------------------------------------MAHASISWA------------------------------------------------------->

//
    // halaman utama mahasiswa
    Route::get('/home_mahasiswa', function () {
        return view('mahasiswa/home_mahasiswa');
    });
    //halaman untuk memilih jenis surat
    Route::get('/pilih_jenis_surat', 'FormatsuratController@pilihSurat');
    //halaman untuk pengisian data diri untuk masing-masing surat
    Route::post('/isi_data_diri', 'FormatsuratController@tampilkanFormulir');

    Route::get('/data_perwakilan_perwalian', function () {
        return view('mahasiswa/data_perwakilan_perwalian');
    });
    Route::get('/data_izin_pengunduran_diri', function () {
        return view('mahasiswa/data_izin_pengunduran_diri');
    });
    Route::get('/data_pembuatan_visa', function () {
        return view('mahasiswa/data_pembuatan_visa');
    });
    //halaman untuk menampilkan preview surat
    Route::post('/preview', 'FormatsuratController@tampilkanIsiForm');
    Route::get('/preview_izin_cuti_studi', function () {
        return view('mahasiswa/preview_izin_cuti_studi');
    });
    Route::get('/preview_izin_pengunduran_diri', function () {
        return view('mahasiswa/preview_izin_pengunduran_diri');
    });
    Route::get('/preview_keterangan', function () {
        return view('mahasiswa/preview_keterangan');
    });
    Route::get('/preview_izin_studi_lapangan', function () {
        return view('mahasiswa/preview_izin_studi_lapangan');
    });
    Route::get('/preview_izin_studi_lapangan_kelompok1', function () {
        return view('mahasiswa/preview_izin_studi_lapangan_kelompok1');
    });
    Route::get('/preview_izin_studi_lapangan_kelompok2', function () {
        return view('mahasiswa/preview_izin_studi_lapangan_kelompok2');
    });
    Route::get('/preview_izin_studi_lapangan_kelompok3', function () {
        return view('mahasiswa/preview_izin_studi_lapangan_kelompok3');
    });
    Route::get('/preview_izin_studi_lapangan_kelompok4', function () {
        return view('mahasiswa/preview_izin_studi_lapangan_kelompok4');
    });
    Route::get('/preview_perwakilan_perwalian', function () {
        return view('mahasiswa/preview_perwakilan_perwalian');
    });
    Route::post('/kirimFormulir', 'PesanansuratController@store');

//<-------------------------------------------------------PETUGAS TU------------------------------------------------------>
    //halaman login TU

    // halaman utama pejabat
    Route::get('/home_TU', 'PesanansuratController@tampilkanPesananSurat');
    //halaman seluruh format surat
    Route::get('/format_surat', 'FormatsuratController@tampilkanSeluruhFormat');
    //untuk menghapus mahasiswa dari database
    Route::post('/hapusMahasiswa', 'MahasiswaController@destroy');
    //untuk menghapus format surat dari database
    Route::post('/hapusFormatsurat', 'FormatsuratController@destroy');
    Route::post('/tampilkanFormat', 'FormatsuratController@tampilkanFormat');
    Route::post('/proses_surat', 'PesanansuratController@sendDataSurat');
    Route::get('/history', function () {
        return view('TU/history');
    });
    // halaman untuk menambahkan format surat baru
    Route::get('/tambah_format_surat', function () {
        return view('TU/tambah_format_surat');
    });
    Route::post('/uploadFormat', 'FormatsuratController@storeFormat');
    //halaman seluruh data mahasiswa
    Route::get('/data_mahasiswa', 'MahasiswaController@pilihMahasiswa');

    // halaman untuk menambahkan data mahasiswa
    Route::get('/tambah_data_mahasiswa', function () {
        return view('TU/tambah_data_mahasiswa');
    });
    Route::post('/generatePDF', 'HistorysuratController@buatPDF');

//<--------------------------------------------------------PEJABAT-------------------------------------------------------->
    // halaman utama pejabat
    Route::get('/home_pejabat', function () {
        return view('pejabat/home_pejabat');
    });
    //halaman pengisisan catatan dosen wali
    Route::get('/catatan_dosen_wali', function () {
        return view('pejabat/catatan_dosen_wali');
    });
    //halaman pengisisan catatan kaprodi
    Route::get('/catatan_ketua_program_studi', function () {
        return view('pejabat/catatan_ketua_program_studi');
    });
    //halaman pengisisan catatan wakil dekan II
    Route::get('/catatan_wakil_dekan_II', function () {
        return view('pejabat/catatan_wakil_dekan_II');
    });
    //halaman pengisisan catatan wakil dekan I
    Route::get('/catatan_wakil_dekan_I', function () {
        return view('pejabat/catatan_wakil_dekan_I');
    });
    //halaman pengisisan catatan dekan
    Route::get('/catatan_dekan', function () {
        return view('pejabat/catatan_dekan');
    });
//
