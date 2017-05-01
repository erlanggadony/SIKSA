
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

    @include('tu.menu')

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content">
              <h1>Input Database Mahasiswa</h1>
              <br><br>
              <form class="form-horizontal" action="{{ url('/uploadDataMhs')}}" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nama" class="col-sm-3">Upload Data Mahasiswa</label>
                  <div class="col-sm-9">
                    <input type="file" name="uploadDataMhs" class="form-control" required />
                  </div>
                </div>
                {!! csrf_field() !!}
                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                </div>
              </form>
            </div>
            @include('tu.profile_bar')
          </div>
      </div>
    </div>
    <div class="footer">
        hahahahahahahahahahahahahahahhahahahahahaha
    </div>
  </body>
</html>
