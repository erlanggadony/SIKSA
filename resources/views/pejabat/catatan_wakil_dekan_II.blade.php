<!DOCTYPE html>
  <head>
      <title>Isi Catatan Wakil Dekan II</title>
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
              <a href="/home_pejabat"><li>Home</li></a>
              <a href="/history_pejabat"><li>History Surat</li></a>
              <li>Logout</li>
            </ul>
         </div>
    </div>

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content">
              <h1>Isi Catatan Wakil Dekan I</h1>
              <br>
              <form class="form-horizontal" method="post" action="/catatanWDII">
                <div class="form-group">
                  <label for="persetujuan" class="col-sm-3">Persetujuan</label>
                  <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" name="persetujuan" value="Setuju" checked>Setuju</label>
                    <label class="radio-inline"><input type="radio" name="persetujuan" value="Tidak setuju" >Tidak setuju</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="catatanWD_II" class="col-sm-3">Catatan Wakil Dekan II</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="catatanWD_II" row="5" name="catatanWD_II"></textarea>
                  </div>
                </div>
                <input type="hidden" value="{{ $formatsurat_id }}" name="jenis_surat">
                <input type="hidden" value="{{ $dataSurat }}" name="dataSurat">
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
