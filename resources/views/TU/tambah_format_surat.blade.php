
<!DOCTYPE html>
  <head>
      <title>Data Mahasiswa</title>
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
               <a href="/history"><li>History Surat</li></a>
               <a href="/data_mahasiswa"><li>Data Mahasiswa</li></a>
               <a href="/format_surat"><li>Format Surat</li></a>
               <li>Logout</li>
            </ul>
         </div>
    </div>

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content">
              <h1>Input Format Surat</h1>
              <br><br>
              <form class="form-horizontal" action="{{ url('/uploadFormat')}}" method="post">
                <div class="form-group">
                  <label for="idFormatSurat" class="col-sm-3">ID Format Surat</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="idFormatSurat" name="idFormatSurat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jenis_surat" class="col-sm-3">Jenis Surat</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jenis_surat" name="jenis_surat">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3" for="keterangan">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" row="3" id="keterangan" name="keterangan"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-3">Upload Format Surat</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" name="uploadformatsurat">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 checkbox">
                    <label><input type="checkbox" /> Saya sudah yakin</label>
                  </div>
                </div>
                {!! csrf_field() !!}
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 checkbox">
                    <button type="submit" class="btn btn-primary">Upload format surat (.TeX)</button>
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
