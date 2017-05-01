
<!DOCTYPE html>
  <head>
      <title>Home</title>
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
            <h1>Pilih Jenis Surat</h1>
            <br>
            <form class="form-horizontal" action="{{ url('/isi_data_diri') }}" method="post">
              <div class="form-group">
                <div class="col-sm-9">
                    @foreach($formatsurats as $formatsurat)
                    <div class="radio">
                      <label>
                        <input type="radio"  name="jenis_surat" value="{{ $formatsurat->id }}" required>
                        {{ $formatsurat->jenis_surat }}
                      </label>
                    </div>
                    @endforeach
                </div>
              </div>
              {!! csrf_field() !!}
              <div class="form-group">
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4 profile">.col-md-4</div>
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
    <div class="footer">
        hahahahahahahahahahahahahahahhahahahahahaha
    </div>
  </body>
</html>
