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

Route::get('/reg', function(){
  return view('auth/register');
});
Route::post('/register', 'Auth\RegisterController@register');
Route::group(['prefix' => 'Api'], function(){
    Route::get('/showFormatSurat', 'Api\FormatsuratAPIController@tampilkanFormat');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/laravel-login', function(){
  return view('auth.login');
});

Route::get('/logout', 'AuthController@logout');
Route::post('/home', 'AuthController@authenticate');
//<-------------------------------------------------------MAHASISWA------------------------------------------------------->
// Route::group(['middleware' => 'auth'], function () {
    // halaman utama mahasiswa
    Route::get('/home_mahasiswa', 'HistorysuratController@tampilkanSeluruhSurat');
    //halaman untuk memilih jenis surat
    Route::get('/pilih_jenis_surat', 'FormatsuratController@pilihSurat');
    //halaman untuk pengisian data diri untuk masing-masing surat
    Route::post('/isi_data_diri', 'FormatsuratController@tampilkanFormulir');
    Route::get('/data_perwakilan_perwalian', function () {
        return view('mahasiswa/data_perwakilan_perwalian');
    });
    Route::get('/data_pembuatan_visa', function () {
        return view('mahasiswa/data_pembuatan_visa');
    });
    //halaman untuk menampilkan preview surat
    Route::post('/preview', 'PesanansuratController@tampilkanPreview');
    Route::post('/kirimFormulir', 'PesanansuratController@store');
//<-------------------------------------------------------PETUGAS TU------------------------------------------------------>
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
    Route::get('/history_TU', 'HistorysuratController@pilihHistorySurat');
    // halaman untuk menambahkan format surat baru
    Route::get('/tambah_format_surat', function () {
        return view('TU/tambah_format_surat');
    });
    Route::get('/tambah_data_mahasiswa', function () {
        return view('TU/tambah_data_mahasiswa');
    });
    Route::post('/uploadFormat', 'FormatsuratController@storeFormat');
    //halaman seluruh data mahasiswa
    Route::get('/data_mahasiswa', 'MahasiswaController@pilihMahasiswa');
    // halaman untuk menambahkan data mahasiswa
    Route::post('/uploadDataMhs', 'MahasiswaController@uploadMahasiswa');
    Route::post('/generatePDF', 'HistorysuratController@buatPDF');
//<--------------------------------------------------------PEJABAT-------------------------------------------------------->
    // halaman utama pejabat
    Route::get('/home_pejabat', 'PesanansuratController@tampilkanPesananDiPejabat');
    //halaman pengisisan catatan dosen wali
    Route::post('/catatanDosenWali', 'PesanansuratController@previewDosenWali');
    //halaman pengisisan catatan kaprodi
    Route::post('/catatanKaprodi', 'PesanansuratController@previewKaprodi');
    //halaman pengisisan catatan wakil dekan II
    Route::post('/catatanWDII', 'PesanansuratController@previewWDII');
    //halaman pengisisan catatan wakil dekan I
    Route::post('/catatanWDI', 'PesanansuratController@previewWDI');
    //halaman pengisisan catatan dekan
    Route::post('/catatanDekan', 'PesanansuratController@previewDekan');
    Route::get('/catatan_dekan', function () {
        return view('pejabat/catatan_dekan');
    });
    Route::get('/history_pejabat', 'HistorysuratController@pilihHistorySurat');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');
