<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <?php
      $username = $data['username'];
      $user = mysqli_query($koneksi, "SELECT * FROM dosen WHERE username='$username' UNION SELECT * FROM mahasiswa WHERE username='$username'");
      $status = mysqli_fetch_assoc($user);

      if($status['status_memilih'] == "Belum")
      {
        ?>
          <script>
            document.location.href='./';
          </script>
        <?php
      }

    ?>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                  <div class="mt-4">
                    <div class="col-md-12 col-sm-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            <h1 class="fas fa-check-circle text-success"></h1>
                            <p><h2>Pemilihan Berhasil</h2></p>
                            <p>Hasil Pemilihan Anda Sudah Masuk Ke Dalam Sistem Kami ! Terima Kasih Atas Partisipasinya :)</p>
                            <p>Jika Ingin Keluar Dari Aplikasi Silahkan Klik Tombol Dibawah</p>
                            <a href="login/logout.php">
                              <button class="tmb tmb-primary"><em class="fas fa-power-off"></em> Logout</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>