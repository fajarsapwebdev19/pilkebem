<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <h5>Rekap Kehadiran</h5>
        <div class="mt-4">
          <div class="col-sm-12 col-md-12">
            <?php
              $database = mysqli_query($koneksi, "SELECT * FROM view_pemilihan");
              $value = mysqli_fetch_assoc($database);

              if(empty($value))
              {
                ?>
                  <div class="alert alert-warn"><em class="fas fa-info"></em> Tombol Download Akan Muncul Ketika Pemilihan Sedang Berjalan</div>
                <?php
              }
              else{
                ?>
                  <a href="../proses/cetak/daftar_hadir.php">
                    <button class="tmb tmb-success tmb-sm">
                      <em class="fas  fa-download"></em> Download Daftar Hadir
                    </button>
                  </a> 
                  <div class="mt-2"></div>
                  <a href="../proses/cetak/daftar_tidakhadir.php" >
                    <button class="tmb tmb-success tmb-sm">
                      <em class="fas fa-download"></em> Download Daftar Tidak Hadir
                    </button>
                  </a>
                <?php
              }
            ?>
            
            <div class="mt-2"></div>
            <table class="table table-responsive table-striped table-bordered table-xs">
              <thead>
                <th>Jenis Data</th>
                <th>Jumlah</th>
              </thead>
              <tbody>
                <tr>
                  <td>Hadir</td>
                  <td class="text-center">
                    <?php
                      $query_hadir = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE kehadiran='Hadir' UNION SELECT * FROM dosen WHERE kehadiran='Hadir'");
                      $hadir = mysqli_num_rows($query_hadir);
                      echo $hadir;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Tidak Hadir</td>
                  <td class="text-center">
                    <?php
                      $query_absent = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE kehadiran='Tidak Hadir' UNION SELECT * FROM dosen WHERE kehadiran='Tidak Hadir'");
                      $tidak_hadir = mysqli_num_rows($query_absent);
                      echo $tidak_hadir;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Jumlah Keseluruhan Peserta</td>
                  <td class="text-center">
                    <?php
                      $query_school = mysqli_query($koneksi, "SELECT * FROM mahasiswa UNION SELECT * FROM dosen");
                      $scholl = mysqli_num_rows($query_school);
                      echo $scholl;
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-xs table-bordered table-hover" id="example">
                    <thead class="bg-header">
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIM / Nama Dosen</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Kelas / Kepegawaian</th>
                        <th class="text-center">Kehadiran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        $data_database = mysqli_query($koneksi, "SELECT * FROM mahasiswa UNION SELECT * FROM dosen ORDER BY nama ASC");
                        while($data = mysqli_fetch_assoc($data_database)):
                      ?>
                      <tr class="<?php if($data['kehadiran'] == "Hadir"){echo 'bg-success text-white';}elseif($data['kehadiran'] == "Tidak Hadir"){echo 'bg-danger text-white';}?>">
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data['username']?></td>
                        <td><?= $data['nama']?></td>
                        <td>
                          <?php
                            if($data['level'] == "Mahasiswa")
                            {
                              echo $data['kelas'];
                            }elseif($data['level'] == "Dosen")
                            {
                              echo "Dosen Dan Tenaga Pendidik";
                            }
                          ?>
                        </td>
                        <td class="text-center">
                          <?= $data['kehadiran'] ?>
                        </td>
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