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
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="nama" class="col-sm-3">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3">NPM</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="npm">
                  </div>
                </div>
                <div class="form-group">
                  <label for="prodi" class="col-sm-3">Program studi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="prodi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fakultas" class="col-sm-3">Fakultas</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="fakultas">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-3">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="5" id="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cutistudiken" class="col-sm-3">Cuti studi ke</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="cutistudiken">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alasancutistudi" class="col-sm-3">Alasan cuti studi</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="5" id="alasancutistudi"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dosenwali" class="col-sm-3">Dosen wali</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="dosenwali">
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
                  <label for="tahunakademik" class="col-sm-3">Tahun akademik</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tahunakademik">
                  </div>
                </div>
                <div class="form-group">
                  <label for="smstr" class="col-sm-3">Unggah surat permohonan cuti studi</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="lapiran_CutiStudi">
                  </div>
                </div>
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
