<!DOCTYPE html>
  <head>
      <title>Home</title>
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
              <a href="/home_pejabat"><li>Home</li></a>
              <a href="/history_pejabat"><li>History Surat</li></a>
              <li>Logout</li>
            </ul>
         </div>
    </div>

    <div class="container">
      <div class="main">
          <div class="row">
            <div class="col-md-8 content">
              <form>
                    <table>
                      <tr>
                        <td><label>Kata kunci :</label></td>
                        <td><label>Cari berdasarkan :</label></td>
                      </tr>

                      <tr>
                        <td class = "search">
                          <select name="kategori" class="form-control">
                            <option value="tanggalBuat">Cari semua surat</option>
                            <option value="noSurat">Nomor surat</option>
                            <option value="tanggalBuat">Tanggal pembuatan</option>
                            <option value="perihal">Perihal</option>
                            <option value="kepada]">Kepada</option>
                            <option value="nama">Pembuat surat</option>
                            <option value="idFormatSurat">Jenis surat</option>
                          </select>
                        </td>
                        <td class = "search">
                          <input type="text" name="searchBox" class="form-control" size="68" />
                        </td>
                        <td>
                          <input type="submit" name="findmail" class="btn btn-primary" value="Cari surat" />
                        </td>
                      </tr>
                    </table>
              </form>
              <br>
              <table class="table table-striped">
                <tr>@if(count($pesanansurats) == 0)
                    <tr>
                        <td colspan="5" align="center">Tidak ada pesanan surat ...</td>
                    </tr>
                @else
                    <tr>
                      <th>JENIS SURAT</th>
                      <th>PERIHAL</th>
                      <th>PEMOHON</th>
                      <th>PENERIMA</th>
                      <th>TANGGAL PEMBUATAN</th>
                      <th>DATA SURAT</th>
                      <th>KONTROL</th>
                    </tr>
                    @foreach($pesanansurats as $pesanansurat)
                        <tr>
                          <td>{{ $pesanansurat->formatsurat_id }}</td>
                          <td>{{ $pesanansurat->perihal }}</td>
                          <td>{{ $pesanansurat->mahasiswa_id }}</td>
                          <td>{{ $pesanansurat->penerimaSurat }}</td>
                          <td>{{ $pesanansurat->created_at }}</td>
                          <td><textarea rows="5" cols="30" style="border: none" readonly>{{ $pesanansurat->dataSurat }}</textarea></td>
                          <td>
                            <form action="/tambahCatatan" method="post">
                              <input type="hidden" value="{{ $pesanansurat->formatsurat_id }}" name="idFormatSurat">
                              <input type="hidden" value="{{ $pesanansurat->dataSurat }}" name="prosesSurat">
                              {!! csrf_field() !!}
                              <button type="submit" class="btn btn-default">Tambah<br>Catatan</button>
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
