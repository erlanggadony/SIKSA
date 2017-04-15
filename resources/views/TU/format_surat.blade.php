
<!DOCTYPE html>
  <head>
      <title>Format Surat</title>
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
              <a href="{{ URL::to('/tambah_format_surat') }}" class="btn btn-default">Tambah Format Surat</a>
              <form class="form-inline" action= "{{ url('/format_surat') }}" method="get">
                <div class="form-group">
                  <label for="kategori_format_surat">Cari berdasarkan :</label><br>
                  <select name="kategori_format_surat" class="form-control">
                    <option value="">Cari semua surat</option>
                    <option value="idFormatSurat">ID Format Surat</option>
                    <option value="jenis_surat">Jenis Surat</option>
                    <option value="keterangan">Keterangan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="searchBox_format_surat">Kata kunci :</label><br>
                  <input type="text" name="searchBox_format_surat" class="form-control" size = "65">
                  <button type="submit" name="findmail" class="btn btn-primary">Cari format surat</button>
                </div>
              </form>
              <br>
              <div></div>
              <table class="table table-striped table-hover">
                @if(count($formatsurats) == 0)
                    <tr>
                        <td colspan="5" align="center">No data found ...</td>
                    </tr>
                @else
                    <tr>
                      <th>ID FORMAT SURAT</th>
                      <th>JENIS SURAT</th>
                      <th>KETERANGAN</th>
                      <th>FILE SURAT</th>
                      <th colspan ="2"> KONTROL</th>
                    </tr>
                    @foreach($formatsurats as $formatsurat)
                      <tr>
                        <td>{{ $formatsurat->idFormatSurat }}</td>
                        <td>{{ $formatsurat->jenis_surat }}</td>
                        <td>{{ $formatsurat->keterangan }}</td>
                        <td>
                          <form action="/tampilkanFormat" method="post">
                            <input type="hidden" value="{{ $formatsurat->id }}" name="showFormatID">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-link">Klik disini</button>
                          </form>
                        </td>
                        <td>
                          <button type="button" class="btn btn-default" aria-label="Edit">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                          </button>
                        </td>
                        <td>
                          <form action="/hapusFormatsurat" method="post">
                            <input type="hidden" value="{{ $formatsurat->id }}" name="deleteID">
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

            <div class="col-md-4 profile">
              <!-- <img id=profpict src="{{ asset("/images/2012730071.jpg") }}" />
              <br>
              <h2>Dony Erlangga</h2>
              <h3>2012730071</h3> -->
            </div>
          </div>
            <!-- <div id="profile">

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
