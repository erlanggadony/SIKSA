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
               <a href="/home_mahasiswa"><li>Home</li></a>
               <a href="/pilih_jenis_surat"><li>Riwayat Surat</li></a>
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
                <tr>
                  <th>NOMOR SURAT</th>
                  <th>TANGGAL PEMBUATAN</th>
                  <th>PERIHAL</th>
                  <th>KEPADA</th>
                  <th>PEMBUAT SURAT</th>
                  <th>JENIS SURAT</th>
                </tr>

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
