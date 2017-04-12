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
                Yang bertanda tangan di bawah ini :</p>
              <form class="form-horizontal" action = "{{ url('/preview') }}" method="post">
                <div class="form-group">
                  <label for="nama" class="col-sm-3">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3">NPM</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="npm" name="npm">
                  </div>
                </div>
                <div class="form-group">
                  <label for="prodi" class="col-sm-3">Program studi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="prodi" name="prodi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="smstr" class="col-sm-3">Semester</label>
                  <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" id="smstr" name="semester" value="ganjil" checked>Ganjil</label>
                    <label class="radio-inline"><input type="radio" id="smstr" name="semester" value="genap" >Genap</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kota_lahir" class="col-sm-3">Kota lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="kota_lahir" name="kota_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tglLahir" class="col-sm-3">Tanggal lahir</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglLahir" name="tglLahir"></input>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-3">Alamat di Bandung</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="5" id="alamat" name="alamat" required></textarea>
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
