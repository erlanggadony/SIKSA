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


    <!-- Navigation here -->
    @include('mahasiswa.menu')

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content form-horizontal">
              <h1>Isi Data Diri Anda</h1>
              <br>
              <form class="form-horizontal" action="{{ url('/preview') }}" method="post">
                  <div class="form-group">
                    <label for="semester" class="col-sm-3">Semester</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control-static" id="semester" name="semseter" value="" readonly style="border: none" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tahunakademik" class="col-sm-3">Tahun akademik</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control date" id="thnAkademik" name="thnAkademik" value="" readonly style="border: none" />
                    </div>
                  </div>
                  <p class="col-sm-12" style="font-weight:bold">
                    IDENTITAS MAHASISWA YANG PERWALIANNYA DIWAKILKAN :
                  </p>
                    <div class="form-group">
                      <label for="nama" class="col-sm-3">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="" readonly style="border: none" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="npm" class="col-sm-3">NPM</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="npm" name="npm" value="" readonly style="border: none">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="prodi" class="col-sm-3">Program studi</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="prodi" name="prodi" value="" readonly style="border: none" />
                      </div>
                    </div>
                  <p class="col-md-12" style="font-weight:bold">
                    IDENTITAS MAHASISWA YANG DIBERI KUASA PERWALIAN :
                  </p>
                  <div class="form-group">
                    <label for="namaWakil" class="col-sm-3">Nama</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="namaWakil" name="namaWakil" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="npmWakil" class="col-sm-3">NPM</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="npmWakil" name="npmWakil" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="prodiwakil" class="col-sm-3">Program studi</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="prodiWakil" name="prodiWakil" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="dosenWali" class="col-sm-3">Dosen wali</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dosenWali" name="dosenWali" value="" readonly style="border: none" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alasan" class="col-sm-3">Alasan tidak hadir perwalian</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" row="5" id="alasan" name="alasan" required></textarea>
                    </div>
                  </div>
                  <div class=" form-group">
                    <label for="matkul" class="col-sm-3">Mata kuliah yang diambil</label>
                    <div class="row">
                      <div class="col-xs-5">
                        <input type="text" class="form-control" name="matkul1" placeholder="Nama mata kuliah" required>
                      </div>
                      <div class="col-xs-2">
                        <input type="text" class="form-control" name="sks1" placeholder="sks" required>
                      </div>
                    </div>
                  </div>
                  <div class=" form-group">
                      <div class="col-sm-offset-3 col-sm-5">
                        <input type="text" class="form-control" name="matkul2" placeholder="Nama mata kuliah" required>
                      </div>
                      <div class="col-xs-2">
                        <input type="text" class="form-control" name="sks2" placeholder="sks" required>
                      </div>
                  </div>
                  <div class=" form-group">
                      <div class="col-sm-offset-3 col-sm-5">
                        <input type="text" class="form-control" name="matkul3" placeholder="Nama mata kuliah" required>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="sks3" placeholder="sks" required>
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
