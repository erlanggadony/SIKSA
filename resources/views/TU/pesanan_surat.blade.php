

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
              <form class="form-inline" action= "{{ url('/pesanan_surat') }}" method="get">
                <div class="form-group">
                  <label for="kategori">Cari berdasarkan :</label><br>
                  <select name="kategori_mahasiswa" class="form-control">
                    <option value="">Cari semua surat</option>
                    <option value="noSurat">Nomor Surat</option>
                    <option value="jenis_surat">Jenis Surat</option>
                    <option value="perihal">Perihal</option>
                    <option value="pemohon">Pemohon</option>
                    <option value="penerima">Penerima</option>
                    <option value="tanggalPembuatan">Tanggal Pembuatan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="searchBox_format_surat">Kata kunci :</label><br>
                  <input type="text" name="searchBox" class="form-control" size="68" />
                  <button type="submit" name="findmail" class="btn btn-primary">Cari surat</button>
                </div>
              </form>
              <br>
              <table class="table table-striped table-hover">
                @if(count($formatsurats) == 0)
                    <tr>
                        <td colspan="5" align="center">No data found ...</td>
                    </tr>
                @else
                    <tr>
                      <th>JENIS SURAT</th>
                      <th>PERIHAL</th>
                      <th>PEMOHON</th>
                      <th>PENERIMA</th>
                      <th>TANGGAL PEMBUATAN</th>
                      <th>DATA SURAT</th>
                    </tr>
                    @foreach($pesanan_surats as $pesanan_surat)
                        <tr>
                          <td>{{ $pesanan_surat->formatsurat_id }}</td>
                          <td>{{ $pesanan_surat->perihal }}</td>
                          <td>{{ $pesanan_surat->mahasiswa_id }}</td>
                          <td>{{ $pesanan_surat->penerimaSurat }}</td>
                          <td>{{ $pesanan_surat->created_at }}</td>
                          <td>{{ $pesanan_surat->dataSurat }}</td>
                        </tr>
                    @endforeach
                @endif
              </table>
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
