<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <h5>Data Mahasiswa (Pemilih)</h5>
        <div class="mt-4">
          <?php
            if($akses['data_siswa'] == "Y")
            {
              ?>
                <div class="row">
                  <div class="col-md-8 col-sm-8 order-sm-0">
                    <div class="card">
                      <div class="card-header bg-header">
                        Data Mahasiswa
                      </div>
                      <div class="card-body">
                        <div class="mt-3">
                          <?php 
                            $query_mhs = "SELECT * FROM mahasiswa";
                            $result = mysqli_query($koneksi, $query_mhs);
                            $hitung_data = mysqli_num_rows($result);
                          ?>
                          <?php
                            if($hitung_data == 0)
                            {
                              ?>
                                <a>
                                  <button disabled class="tmb tmb-danger bg-danger text-white mb-2" data-target="#reset_all" data-toggle="modal"><em class="fas fa-info-circle"></em> Reset Semua Password</button>
                                </a>
                                <a>
                                  <button disabled class="tmb tmb-success bg-success text-white mb-2"><em class="fas fa-file-excel"></em> Ekspor Data Mahasiswa</button>
                                </a>
                              <?php
                            }else{
                              ?>
                                  <a>
                                    <button class="tmb tmb-danger bg-danger text-white mb-2" data-target="#reset_all" data-toggle="modal"><em class="fas fa-info-circle"></em> Reset Semua Password</button>
                                  </a>
                                  <a>
                                    <button onclick="javascript:window.location.href='../proses/ekspor/mahasiswa.php';" class="tmb tmb-success bg-success text-white mb-2"><em class="fas fa-file-excel"></em> Ekspor Data Mahasiswa</button>
                                  </a>
                              <?php
                            }
                          ?>
                          
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="reset_all" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Reset All Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="../proses/reset/all_password.php" method="post">
                                <div class="modal-body">
                                  Masukan Password Baru
                                    <div class="row mb-3">
                                      <div class="col-md-4">
                                        <div id="pass_new">
                                        </div>
                                      </div>
                                      <div class="col-md-1">
                                        <button type="button" class="btn btn-link" id="generate_password">
                                          <em class="fas fa-sync-alt text-success"></em>
                                        </button>
                                      </div>
                                    </div>
                                    <input type="hidden" name="level" value="Mahasiswa">
                                    <div class="modal-footer">
                                      <button type="submit" name="reset_all_mhs" class="tmb tmb-success bg-success">Reset Password</button>
                                      <button type="button" class="tmb tmb-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="mt-2"></div>
                        <div class="table-responsive">
                          <table id="example" class="table table-hover table-bordered table-xs nowrap">
                            <thead class="bg-header">
                              <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">JK</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 1;
                                $query_siswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nama ASC");
                                foreach ($query_siswa as $data) :
                              ?>
                                <tr>
                                  <td class="text-center"><?= $no++; ?></td>
                                  <td class="text-center"><?= $data['username'] ?></td>
                                  <td><?= $data['nama']; ?></td>
                                  <td class="text-center"><?= $data['jenis_kelamin']?></td>
                                  <td class="text-center"><?= $data['kelas']; ?></td>
                                  <td class="justify-content-center">
                                    <a data-id="<?= $data['id']; ?>" class="update_mahasiswa"> 
                                      <button class="tmb tmb-sm tmb-primary"><em class="fas fa-edit"></em> Edit</button> 
                                    </a> 
                                    <a data-target="#hapus<?= $data['id'] ?>" data-toggle="modal">
                                      <button class="tmb tmb-sm tmb-danger"> <em class="fas fa-trash"></em> Delete </button>
                                    </a> 
                                  </td>
                                </tr>
                                <?php require 'btn/mahasiswa.php'; ?>
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
                        Tambah Mahasiswa
                      </div>
                      <div class="card-body">
                        <?php
                          if (isset($_SESSION['val']) && $_SESSION['val'] != '') {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                          }
                        ?>


                        <form action="../proses/tambah/mahasiswa.php" method="post" class="needs-validation" novalidate autocomplete="off">

                          <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" name="username" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <div class="mt-2"></div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jklmhs1" value="L" required>
                              <label class="custom-control-label" for="jklmhs1">L</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jklmhs2" value="P" required>
                              <label class="custom-control-label" for="jklmhs2">P</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control" required>
                              <option value="">Pilih</option>
                              <?php
                              $query_kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                              foreach ($query_kelas as $data) :
                              ?>
                                <option><?= $data['nama_kelas'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <button type="submit" name="tambah" class="tmb tmb-primary">Tambah</button>
                          </div>
                          <hr>
                          
                        </form>
                        <h5>Import Data</h5>
                          <form action="../proses/import/mahasiswa.php" method="post" enctype="multipart/form-data">
                              <input type="file" name="file_excel" class="form-control">
                              <div class="form-group mt-4">
                                <a>
                                  <button type="submit" class="tmb tmb-info mb-2" name="import"><em class="fas fa-upload"></em>  Import </button>
                                </a>
                                <a><button type="button" onclick="javascript:window.location.href='../assets/template-import-mahasiswa.xlsx'" class="tmb tmb-warning mb-2"><em class="fas fa-download"></em> Download Template</button></a>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }elseif($akses['data_siswa'] == "N")
            {
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
<script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery/js/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.update_mahasiswa').on('click', function() {
      var id_mhs = $(this).data("id");

      $.ajax({
        url: 'ajax/update_mahasiswa.php',
        type: 'POST',
        data: {id_mhs:id_mhs},
        success:function(respond)
        {
          $("#form-edit-mhs").html(respond);
          $("#edit_mhs").modal('show');
        }
      });
    });
  });
</script>