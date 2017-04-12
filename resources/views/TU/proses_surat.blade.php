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
                <form class="form-horizontal" action="{{ url('/') }}" method="post">
                    <div class="form-group">
                        <label class="col-sm-3" for="noSurat">Nomor Surat</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="noSurat" required />
                        </div>
                    </div>
                    <input type="hidden" value="{{ $dataSurat }}" name="dataSurat">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                          <button type="submit" class="btn btn-success">Buat surat (PDF)</button>
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
