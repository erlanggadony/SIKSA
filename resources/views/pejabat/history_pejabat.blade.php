

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

    <!-- Navigation Here -->
    @include('pejabat.menu')

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content">
              <form class="form-inline" action= "{{ url('/format_surat') }}" method="get">
                <div class="form-group">
                  <label for="kategori_format_surat">Cari berdasarkan :</label><br>
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
                @if($historysurats != null)
                  @if(count($historysurats) == 0)
                      <tr>
                          <td colspan="5" align="center">Tidak ada history surat....</td>
                      </tr>
                  @else
                      <tr>
                        <th>NOMOR SURAT</th>
                        <th>JENIS SURAT</th>
                        <th>PERIHAL</th>
                        <th>PEMOHON</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL PEMBUATAN</th>
                        <th>ARSIP SURAT</th>
                      </tr>
                      @foreach($historysurats as $historysurat)
                        <tr>
                          <td>{{ $historysurat->no_surat }}</td>
                          <td>{{ $historysurat->perihal }}</td>
                          <td>{{ $historysurat->penerimaSurat }}</td>
                          <td>{{ $historysurat->pemohon }}</td>
                          <td>{{ $historysurat->jenis_surat }}</td>
                          <td>{{ $historysurat->created_at }}</td>
                          <td>
                              <button type="submit" value="{{ $historysurat->link_arsip_surat }}" class="btn btn-link">Klik disini</button>
                          </td>
                        </tr>
                      @endforeach
                  @endif
                @endif
              </table>
              <div style="text-align:center">{!! $historysurats->links() !!}</div>
            </div>
            @include('pejabat.profile_bar')
          </div>
      </div>
    </div>
    <div class="footer">
        hahahahahahahahahahahahahahahhahahahahahaha
    </div>
  </body>
</html>
