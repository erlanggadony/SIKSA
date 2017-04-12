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
                  <label for="alamat" class="col-sm-3">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="5" id="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="notelepon" class="col-sm-3">Nomor telepon </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="notelepon">
                  </div>
                </div>
                <div class="form-group">
                  <label for="namaortu" class="col-sm-3">Nama orang tua</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namaortu">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal" class="col-sm-3">Tanggal pembuatan surat</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control date" id="tanggal">
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
                  <label for="smstr" class="col-sm-3">Unggah surat permohonan pengunduran diri</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="lapiran_PengunduranDiri">
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
