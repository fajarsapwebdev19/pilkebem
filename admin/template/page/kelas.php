<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <h5>Data Kelas</h5>
        <div class="mt-4">
          <?php
            if($akses['data_kelas'] == "Y")
            {
              ?>
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <div class="card">
                      <div class="card-header bg-header">
                        Data Kelas
                      </div>
                      <div class="card-body">
                        <div class="table-responsive-sm">
                          <table class="table table-hover table-sm" id="example">
                            <thead class="bg-header">
                              <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $query_kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                $no = 1;
                                foreach($query_kelas as $data):
                              ?>
                                <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $data['nama_kelas'] ?></td>
                                  <td>
                                    <a data-target="#delete<?= $data['id'] ?>" data-toggle="modal">
                                      <button  class="tmb tmb-danger tmb-sm"><em class="fas fa-times"></em> Delete </button>
                                    </a>
                                  </td>
                                </tr>
                                <?php require 'btn/delete_class.php'; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <div class="card">
                      <div class="card-header bg-header">
                        <h6>Tambah Kelas</h6>
                      </div>
                      <div class="card-body">
                        <?php
                          if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                          {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                          }
                        ?>
                        <form action="../proses/tambah/kelas.php" method="post">
                          <label for="">Nama Kelas</label>
                          <input type="text" name="nama_kelas" class="form-control">
                          <div class="mt-2">
                          <button type="submit" name="tambah" class="tmb tmb-primary">
                            Tambah
                          </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }elseif($akses['data_kelas'] == "N"){
              ?>
                <div class="alert alert-warn"><em class="fas fa-info"></em> Anda Tidak Memiliki Akses Untuk Mengakses Halaman Ini !</div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>