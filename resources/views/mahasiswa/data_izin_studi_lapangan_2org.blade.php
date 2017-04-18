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
               <a href="/home_mahasiswa"><li>Home</li></a>
               <a href="/pilih_jenis_surat"><li>Buat Surat</li></a>
               <li>Logout</li>
            </ul>
         </div>
    </div>

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content">
              <h1>Isi Data Diri Anda</h1>
              <br>
              <form class="form-horizontal" action="{{ url('/preview') }}" method="post">
                <div class="form-group">
                  <label for="nama" class="col-sm-3">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3">NPM</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="npm">
                  </div>
                </div>
                <div class="form-group prev">
                  <label for="prodi" class="col-sm-3">Program studi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="prodi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="matkul" class="col-sm-3">Mata kuliah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="matkul">
                  </div>
                </div>
                <div class="form-group">
                  <label for="topik" class="col-sm-3">Topik</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="topik">
                  </div>
                </div>
                <div class="form-group">
                  <label for="organisasi" class="col-sm-3">Organisasi tujuan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="organisasi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamatOrganisasi" class="col-sm-3">Alamat organisasi tujuan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="5" name="alamatOrganisasi"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keperluanKunjungan" class="col-sm-3">Keperluan kunjungan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="keperluanKunjungan">
                  </div>
                </div>
                <div class="form-group">
                    <label for="dataRekan" class="col-sm-3">Data rekan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="namaAnggota" placeholder="Nama anggota">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="npmAnggota" placeholder="NPM">
                    </div>
                </div>
              <input type="hidden" value="{{ $formatsurat_id }}" name="jenis_surat">
                {!! csrf_field() !!}
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                  </div>
                </div>
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
  </body>
  <script type="text/javascript" src="{{ asset("js/jquery-3.2.0.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("js/custom.js") }}"></script>
</html>
