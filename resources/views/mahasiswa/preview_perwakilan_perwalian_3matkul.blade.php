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
              <h4 style="font-weight:bold;">FORMULIR PERWALIAN YANG DIWAKILKAN</h4>
              <br>
              <form action = "{{ url('/kirimFormulir') }}" method="post">
                <div class="form-group">
                  <label for="nama" class="col-sm-3 prevLabel">Semester</label>
                  <div class="col-sm-9">
                    {{ $semester }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">Tahun AKademik</label>
                  <div class="col-sm-9">
                    {{ $thnAkademik }}
                  </div>
                </div>
                <p class="col-sm-12" style="font-weight:bold">
                  IDENTITAS MAHASISWA YANG PERWALIANNYA DIWAKILKAN :
                </p>
                <div class="form-group">
                  <label for="nama" class="col-sm-3 prevLabel">Nama</label>
                  <div class="col-sm-9">
                    {{ $nama }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">NPM</label>
                  <div class="col-sm-9">
                    {{ $npm }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">Program Studi</label>
                  <div class="col-sm-9">
                    {{ $prodi }}
                  </div>
                </div>
                <p class="col-md-12" style="font-weight:bold">
                  IDENTITAS MAHASISWA YANG DIBERI KUASA PERWALIAN :
                </p>
                <div class="form-group">
                  <label for="nama" class="col-sm-3 prevLabel">Nama</label>
                  <div class="col-sm-9">
                    {{ $namaWakil }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">NPM</label>
                  <div class="col-sm-9">
                    {{ $npmWakil }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">Program Studi</label>
                  <div class="col-sm-9">
                    {{ $prodiWakil }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">Alasan tidak bisa hadir perwalian</label>
                  <div class="col-sm-9">
                    {{ $alasan }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="npm" class="col-sm-3 prevLabel">Mata kuliah yang diambil di FRS</label>
                  <div class="col-sm-9">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th style="text-align:center;background-color:#eee">No.</th>
                        <th style="text-align:center;background-color:#eee">Kode Mata Kuliah</th>
                        <th style="text-align:center;background-color:#eee">Nama Mata Kuliah</th>
                        <th style="text-align:center;background-color:#eee">SKS</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>AIF201</td>
                        <td>{{ $matkul1 }}</td>
                        <td>{{ $sks1 }}</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>AIF201</td>
                        <td>{{ $matkul2 }}</td>
                        <td>{{ $sks2 }}</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>AIF201</td>
                        <td>{{ $matkul3 }}</td>
                        <td>{{ $sks3 }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <p>
                      <p style="font-weight:bold;text-decoration:underline">LAMPIRAN</p>
                      1. Fotokopi KTM mahasiswa yanng menerima kuasa perwalian
                    </p>
                  </div>
                </div>
                <input type="hidden" value="{{ $formatsurat_id }}" name="idFormat">
                <input type="hidden" value="{{ $dataSurat }}" name="dataSurat">
                {!! csrf_field() !!}
                <br>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <button class="btn btn-default" onclick="goBack()">Kembali</button>
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
