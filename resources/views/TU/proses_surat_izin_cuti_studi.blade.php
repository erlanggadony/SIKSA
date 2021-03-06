<!DOCTYPE html>
  <head>
      <title>Isi data diri</title>
      <link href="{{ asset("/bootstrap-3.3.7-dist/css/bootstrap.css") }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset("/css/styles_list_surat.css") }}" rel="stylesheet" type="text/css">

  </head>

  <body>
    <div>
        <img id=banner src="{{ asset("/images/banner ftis.png") }}" />
    </div>


    <div class="navigation">
         <div class="navbar text-center">
            <ul class="inline">
              <a href="/home_TU"><li>Home</li></a>
              <a href="/history_TU"><li>History Surat</li></a>
              <a href="/data_mahasiswa"><li>Data Mahasiswa</li></a>
              <a href="/format_surat"><li>Format Surat</li></a>
              <li>Logout</li>
            </ul>
         </div>
    </div>

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 contentPreview form-horizontal">
              <h3 style="font-weight:bold;">Preview Akhir dan Isi Nomor Surat</h3>
              <br>
              <form class="form-horizontal" action="{{ url('/generatePDF') }}" method="post">
                <div class="form-group">
                  <label for="nama" class="col-sm-3 prevLabel">Nama</label>
                  <div class="col-sm-9" name="nama">
                    {{ $nama }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">NPM</label>
                  <div class="col-sm-9" name="npm">
                    {{ $npm }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="prodi" class="col-sm-3 prevLabel">Program Studi</label>
                  <div class="col-sm-9" name="prodi">
                    {{ $prodi }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="fakultas" class="col-sm-3 prevLabel">Fakultas</label>
                  <div class="col-sm-9" name="fakultas">
                    {{ $fakultas }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-3 prevLabel">Alamat</label>
                  <div class="col-sm-9" name="alamat">
                    {{ $alamat}}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="alasanCutiStudi" class="col-sm-3 prevLabel">Alasan cuti studi ke </label>
                  <div class="col-sm-9" name="alasanCutiStudi">
                    {{ $cutiStudiKe }}<br>
                    {{ $alasanCutiStudi }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="catatanDosenWali" class="col-sm-3 prevLabel">Catatan dosen wali </label>
                  <div class="col-sm-9" name="catatanDosenWali">
                    Nama : {{ $dosenWali }}<br>
                    {{ $persetujuanDosenWali }}<br>
                    {{ $catatanDosenWali }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="catatanKaprodi" class="col-sm-3 prevLabel">Catatan Kaprodi </label>
                  <div class="col-sm-9" name="catatanKaprodi">
                    {{ $persetujuanKaprodi }}<br>
                    {{ $catatanKaprodi }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="catatanWDII" class="col-sm-3 prevLabel">Catatan WD II</label>
                  <div class="col-sm-9" name="catatanWDII">
                    {{ $persetujuanWDII }}<br>
                    {{ $catatanWDII }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="catatanWDI" class="col-sm-3 prevLabel">Catatan WD I</label>
                  <div class="col-sm-9" name="catatanWDI">
                    {{ $persetujuanWDI }}<br>
                    {{ $catatanWDI }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="persetujuanDekan" class="col-sm-3 prevLabel">Persetujuan Dekan</label>
                  <div class="col-sm-9" name="persetujuanDekan" >
                    {{ $persetujuanDekan }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="semester" class="col-sm-3 prevLabel">Semester</label>
                  <div class="col-sm-9" name="semester">
                    {{ $semester }}
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="thnAkademik" class="col-sm-3 prevLabel">Tahun Akademik</label>
                  <div class="col-sm-9" name="thnAkademik">
                    {{ $thnAkademik }}
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="noSurat">Nomor Surat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="noSurat" required />
                    </div>
                </div>
                <input type="hidden" value="{{ $dataSurat }}" id="format" name="data">
                <input type="hidden" value="{{ $formatsurat_id }}" name="idFormatSurat">
                {!! csrf_field() !!}
                <br>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <button class="btn btn-default" onclick="goBack()">Kembali</button>
                    <button type="submit" class="btn btn-success">Buat Surat (PDF)</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-4 profile">.col-md-4</div>
          </div>
            <!-- <div id="profile">
                <img id=profpict src="{{ asset("/images/2012730071.jpg") }}" />
                <br>
                <h2>Dony Erlangga</h2>
                <h3>2012730071</h3>
                </div>
            </div>

            <div id = "content">

            </div> -->

      </div>
    </div>
    <div class="footer">
        hahahahahahahahahahahahahahahhahahahahahaha
    </div>
    <script>
      function goBack() {
          window.history.back();
      }
    </script>
  </body>
</html>
