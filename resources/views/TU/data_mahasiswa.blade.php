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
              <a href="{{ URL::to('/tambah_data_mahasiswa') }}" class="btn btn-default">Tambah Data Mahasiswa</a>
              <form class="form-inline" action= "{{ url('/data_mahasiswa') }}" method="get">
                <div class="form-group">
                  <label for="kategori_mahasiswa">Cari berdasarkan :</label><br>
                  <select name="kategori_mahasiswa" class="form-control">
                    <option value="tanggalBuat">Cari semua surat</option>
                    <option value="nirm">NIRM</option>
                    <option value="npm">NPM</option>
                    <option value="nama_mahasiswa">Nama Mahasiswa</option>
                    <option value="prodi">Program Studi</option>
                    <option value="angkatan">Angkatan</option>
                    <option value="kota_lahir">Kota Lahir</option>
                    <option value="tanggal_lahir">Tanggal Lahir</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="searchBox">Kata kunci :</label><br>
                  <input type="text" name="searchBox" class="form-control" size = "65">
                  <button type="submit" name="findmail" class="btn btn-primary">Cari mahasiswa</button>
                </div>
              </form>
              <br>
              <table class="table table-striped table-hover">
                @if(count($mahasiswas) == 0)
                    <tr>
                        <td colspan="5" align="center">No data found ...</td>
                    </tr>
                @else
                    <tr>
                      <th>NIRM</th>
                      <th>NPM</th>
                      <th>NAMA MAHASISWA</th>
                      <th>PROGRAM STUDI</th>
                      <th>ANGKATAN</th>
                      <th>KOTA LAHIR</th>
                      <th>TANGGAL LAHIR</th>
                      <th>FOTO</th>
                      <th colspan ="2"> KONTROL</th>
                    </tr>
                    @foreach($mahasiswas as $mahasiswa)
                      <tr>
                        <td>{{ $mahasiswa->nirm }}</td>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->jurusan_id }}</td>
                        <td>{{ $mahasiswa->angkatan }}</td>
                        <td>{{ $mahasiswa->kota_lahir }}</td>
                        <td>{{ $mahasiswa->tanggal_lahir }}</td>
                        <td style="text-align:center"><a href = "{{ $mahasiswa->foto }}">klik disini</a></td>
                        <td>
                          <button type="button" class="btn btn-default" aria-label="Edit" data-toggle="tooltip" title="Edit">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                          </button>
                        </td>
                        <td>
                          <form action="/hapusMahasiswa" method="post">
                            <input type="hidden" value="{{ $mahasiswa->id }}" name="deleteID">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger" aria-label="Remove" data-toggle="tooltip" title="Remove">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                          </form>
                        </td>
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
