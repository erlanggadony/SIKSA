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
                        <td colspan="5" align="center">Tidak ada data mahasiswa ...</td>
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
                      <th>DOSEN WALI</th>
                      <th>FOTO</th>
                      <th>KONTROL</th>
                    </tr>
                    @foreach($mahasiswas as $mahasiswa)
                      <tr>
                        <td class="ctr">{{ $mahasiswa->nirm }}</td>
                        <td class="ctr">{{ $mahasiswa->npm }}</td>
                        <td class="ctr">{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td class="ctr">{{ $mahasiswa->jurusan_id }}</td>
                        <td class="ctr">{{ $mahasiswa->angkatan }}</td>
                        <td class="ctr">{{ $mahasiswa->kota_lahir }}</td>
                        <td class="ctr">{{ $mahasiswa->tanggal_lahir }}</td>
                        <td class="ctr">{{ $mahasiswa->nama_dosen }}</td>
                        <td style="text-align:center"><a href = "{{ $mahasiswa->foto }}">klik disini</a></td>
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
            @include('tu.profile_bar')
          </div>
      </div>
    </div>
    <div class="footer">
        hahahahahahahahahahahahahahahhahahahahahaha
    </div>
  </body>
</html>
