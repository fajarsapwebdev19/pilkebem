<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <h5>Rekap Pemilih</h5>
        <div class="mt-4">
          <div class="col-md-12 col-sm-12">
            <?php
              $database = mysqli_query($koneksi, "SELECT * FROM view_pemilihan");
              $view = mysqli_fetch_assoc($database);

              if(empty($view))
              {
                ?>
                  <div class="alert alert-warn"><em class="fas fa-info"></em> Tombol Download Akan Muncul Ketika Pemilihan Sedang Berjalan</div>
                <?php
              }else{
                ?>
                  <a>
                    <button onclick="javascript:window.open('../proses/cetak/daftar_sudahmilih.php')" class="tmb tmb-success tmb-sm"><em class="fas fa-download"></em> Unduh Sudah Memilih</button>
                  </a>
                  <div class="mt-2"></div>
                  <a>
                    <button onclick="window.open('../proses/cetak/daftar_belummilih.php')" class="tmb tmb-success tmb-sm"><em class="fas fa-download"></em> Unduh Belum Memilih</button>
                  </a> 
                <?php
              }
            ?>
            <div class="mt-3"></div>
            <?php
              if(isset($_SESSION['val']) && $_SESSION['val'] !='')
              {
                echo $_SESSION['val'];
                unset($_SESSION['val']);
              }
            ?>
            <table class="table table-xs table-responsive table-bordered table-striped">
              <thead class="bg-header">
                <tr>
                  <th class="text-center">Jenis Data</th>
                  <th class="text-center">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Sudah Memilih</td>
                  <td class="text-center">
                    <?php
                      $memilih = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE status_memilih='Sudah' UNION SELECT * FROM dosen WHERE status_memilih='Sudah'");
                      $sudah = mysqli_num_rows($memilih);
                      echo $sudah;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Belum Memilih</td>
                  <td class="text-center">
                    <?php
                      $memilih = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE status_memilih='Belum' UNION SELECT * FROM dosen WHERE status_memilih='Belum'");
                      $belum = mysqli_num_rows($memilih);
                      echo $belum;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Jumlah Pemilih</td>
                  <td class="text-center">
                    <?php
                      $peserta = mysqli_query($koneksi, "SELECT * FROM mahasiswa UNION SELECT * FROM dosen");
                      $jumlah_seluruh = mysqli_num_rows($peserta);
                      echo $jumlah_seluruh;
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-xs table-hover" id="example">
                    <thead class="bg-header">
                      <th class="text-center">No</th>
                      <th class="text-center">NIM / Nama Dosen</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Kelas / Kepegawaian</th>
                      <th class="text-center">Memilih</th>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        $data_pemilih = mysqli_query($koneksi, "SELECT * FROM mahasiswa UNION SELECT * FROM dosen ORDER BY nama ASC");
                        while($data = mysqli_fetch_assoc($data_pemilih)):
                      ?>
                        <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td><?= $data['username']?></td>
                          <td><?= $data['nama']?> <em class="<?php if($data['status_memilih'] == "Sudah"){echo 'fas fa-check text-success';}elseif($data['status_memilih'] == "Belum"){echo 'fas fa-times text-danger';}?>"></em></td>
                          <td><?php
                                if($data['level'] == "Mahasiswa")
                                {
                                  echo $data['kelas'];
                                }
                                elseif($data['level'] == "Dosen"){
                                  echo "Dosen Dan Tenaga Pendidik";
                                }
                              ?>
                          </td>
                          <td><?= $data['status_memilih']?></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>