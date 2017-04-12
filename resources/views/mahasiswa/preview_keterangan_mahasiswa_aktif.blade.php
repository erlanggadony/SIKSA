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
            <div class="col-md-8 contentPreview form-horizontal">
              <h4 style="font-weight:bold;text-decoration:underline">FORMULIR PERMOHONAN SURAT KETERANGAN</h4>
              <br>
              <p>
                Yang bertanda tangan di bawah ini :</p>
                <form action = "{{ url('/kirimFormulir') }}" method="post">
                  <div class="form-group">
                    <label class="col-sm-4 prevLabel">Nama</label>
                    <div class="col-sm-8 prev">
                      {{ $nama }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 prevLabel">NPM</label>
                    <div class="col-sm-8 prev">
                      {{ $npm }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 prevLabel">Program Studi</label>
                    <div class="col-sm-8 prev">
                      {{ $prodi }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 prevLabel">Semester</label>
                    <div class="col-sm-8">
                      {{ $semester }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 prevLabel">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-8 prev">
                      {{ $kota_lahir}}, {{ $tglLahir}}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 prevLabel">Alamat di Bandung</label>
                    <div class="col-sm-8">
                      {{ $alamat }}
                    </div>
                  </div>
                  <input type="hidden" value="{{ $formatsurat_id }}" name="idFormat">
                  <input type="hidden" value="{{ $dataSurat }}" name="dataSurat">
                  {!! csrf_field() !!}
                  <br>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <button class="btn btn-default" onclick="goBack()">Go Back</button>
                      <button type="submit" class="btn btn-success">Buat Surat</button>
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
    <script>
      function goBack() {
          window.history.back();
      }
    </script>
  </body>
</html>
