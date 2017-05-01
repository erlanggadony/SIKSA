<!DOCTYPE html>
  <head>
      <title>Home - Mahasiswa</title>
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
            <div class="col-md-8 content">
              <form class="form-inline" action= "{{ url('/data_mahasiswa') }}" method="get">
                <div class="form-group">
                  <label for="kategori_mahasiswa">Cari berdasarkan :</label><br>
                  <select name="kategori" class="form-control">
                    <option value="tanggalBuat">Cari semua surat</option>
                    <option value="tanggalBuat">Tanggal pembuatan</option>
                    <option value="perihal">Perihal</option>
                    <option value="kepada">Kepada</option>
                    <option value="jenis_surat">Jenis surat</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="searchBox">Kata kunci :</label><br>
                  <input type="text" name="searchBox" class="form-control" size="69" />
                  <button type="submit" name="findmail" class="btn btn-primary">Cari surat</button>
                </div>
              </form>
              <br>
              <table class="table table-striped">
                <tr>
                  <th>TANGGAL PEMBUATAN</th>
                  <th>PERIHAL</th>
                  <th>KEPADA</th>
                  <th>JENIS SURAT</th>
                </tr>

              </table>
            </div>
            <div class="col-md-4 profile">{{ $user->name }}</div>
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
