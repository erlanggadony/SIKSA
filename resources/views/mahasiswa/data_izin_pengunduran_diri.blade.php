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
              <p>
              Kepada Yth.<br>
              Dekan Fakultas Teknologi Informasi dan Sains<br>
              Universitas Katolik Parahyangan<br>
              Jl. Ciumbuleuit no. 94 Bandung<br>
              <br>
              Dengan ini saya,
              </p>
              <form class="form-horizontal" action="{{ url('/preview') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nama" class="col-sm-3">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="" readonly style="border: none" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3">NPM</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="npm" name="npm" value="" readonly style="border: none" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-3">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="5" id="alamat" name="alamat" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="noTelepon" class="col-sm-3">Nomor telepon </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="noTelepon" name="noTelepon" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="namaOrtu" class="col-sm-3">Nama orang tua</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namaOrtu" name="namaOrtu" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="smstr" class="col-sm-3">Semester</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control-static" id="semester" name="semseter" value="" readonly style="border: none" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="smstr" class="col-sm-3">Unggah surat permohonan pengunduran diri</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="lampiran_PengunduranDiri" name="lampiran_PengunduranDiri" required>
                  </div>
                </div>
                <input type="hidden" value="{{ $formatsurat_id }}" name="jenis_surat">
                {!! csrf_field() !!}
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
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
  </body>
</html>
