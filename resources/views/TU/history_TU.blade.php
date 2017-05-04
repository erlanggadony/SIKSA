

<!DOCTYPE html>
  <head>
      <title>Data Mahasiswa</title>
      <link href="{{ asset("/bootstrap-3.3.7-dist/css/bootstrap.css") }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset("/css/styles_list_surat.css") }}" rel="stylesheet" type="text/css" />
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
                        <th>PENANDATANGANAN</th>
                        <th>PENGAMBILAN</th>
                      </tr>
                      @foreach($historysurats as $historysurat)
                        <tr>
                          <td class="ctr">{{ $historysurat->no_surat }}</td>
                          <td class="ctr">{{ $historysurat->formatsurats_id }}</td>
                          <td class="ctr">{{ $historysurat->perihal }}</td>
                          <td class="ctr">{{ $historysurat->mahasiswa_id }}</td>
                          <td class="ctr">{{ $historysurat->penerimaSurat }}</td>
                          <td class="ctr">{{ $historysurat->created_at }}</td>
                          <td class="ctr">
                            @if($historysurat->penandatanganan)
                              <p>Sudah</p>
                            @else
                              <p>Belum</p>
                            @endif
                          </td>
                          <td align="center">
                            @if($historysurat->pengambilan)
                              <button type="submit" disabled class="btn btn-success">Sudah</button>
                            @else
                              @if($historysurat->penandatanganan == false)
                                <button type="submit" disabled class="btn btn-default">Belum</button>
                              @else
                                <form method="post" action="{{url('/ubahStatusPengambilan')}}">
                                  <input type="hidden" value="{{ $historysurat->id }}" name="id">
                                  {!! csrf_field() !!}
                                  <button type="submit" class="btn btn-default">Belum</button>
                                </form>
                              @endif
                            @endif
                          </td>
                        </tr>
                      @endforeach
                  @endif
                @endif
              </table>
              <div style="text-align:center">{!! $historysurats->links() !!}</div>
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
