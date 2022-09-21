<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <h5>Data Dosen Dan Tenaga Pendidik (Pemilih)</h5>
        <div class="mt-4">
          <?php
            if($akses['data_gtk'] == "Y")
            {
              ?>
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <div class="card">
                      <div class="card-header bg-header">
                        Data Dosen Dan Tenaga Pendidik
                      </div>
                      <div class="card-body">
                        <div class="mt-3">
                            <?php 
                              $query_dsn = "SELECT * FROM dosen";
                              $result = mysqli_query($koneksi, $query_dsn);
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
                                    <button disabled class="tmb tmb-success bg-success text-white mb-2"><em class="fas fa-file-excel"></em> Ekspor Data DTK</button>
                                  </a>
                                <?php
                              }else
                              {
                                ?>
                                    <a>
                                      <button class="tmb tmb-danger bg-danger text-white mb-2" data-target="#reset_all" data-toggle="modal"><em class="fas fa-info-circle"></em> Reset Semua Password</button>
                                    </a>
                                    <a>
                                      <button onclick="javascript:window.location.href='../proses/ekspor/dosen.php'" class="tmb tmb-success bg-success text-white mb-2"><em class="fas fa-file-excel"></em> Ekspor Data DTK</button>
                                    </a>
                                <?php
                              }
                            ?>

                            <div class="mt-3"></div>

                            <!-- Modal -->
                            <div class="modal fade" id="reset_all" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Reset All Password</h5>
                                    <button type="button" class="close" onclick="reload()" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Masukan Password Baru
                                    <form action="../proses/reset/all_password.php" method="post">
                                      <input type="text" name="password_baru" value="<?= rand(11111,99999)?>" class="form-control mt-2">
                                      <input type="hidden" name="level" value="Dosen">
                                      <div class="modal-footer">
                                        <button type="submit" name="reset_all_dsn" class="tmb tmb-success bg-success">Reset Password</button>
                                        <button type="button" class="tmb tmb-danger" onclick = "reload()" data-dismiss="modal">Batal</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="table-responsive">
                          <table id="example" class="table table-hover table-bordered table-sm nowrap">
                            <thead class="bg-header">
                              <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">JK</th>
                                <th class="text-center">Kepegawaian</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no = 1;
                                $query_dtk = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY nama ASC");
                                foreach ($query_dtk as $data) :
                              ?>
                                <tr>
                                  <td class="text-center"><?= $no++; ?></td>
                                  <td><?= $data['nama']; ?></td>
                                  <td><?= $data['jenis_kelamin']?></td>
                                  <td><?= $data['kepegawaian']?></td>
                                  <td class="text-center">
                                    <a class="edit_dtk" data-id="<?= $data['id']?>">
                                      <button class="tmb tmb-sm tmb-primary"><em class="fas fa-edit"></em> Edit</button>
                                    </a> 
                                    <a data-target="#hapus<?= $data['id'] ?>" data-toggle="modal">
                                      <button  class="tmb tmb-sm tmb-danger"><em class="fas fa-trash"></em> Delete</button> 
                                    </a> 
                                  </td>
                                </tr>
                                <?php require 'btn/dtk.php'; ?>
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
                        Tambah DTK
                      </div>
                      <div class="card-body">
                        <?php
                          if (isset($_SESSION['val']) && $_SESSION['val'] != '') {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                          }
                        ?>


                        <form action="../proses/tambah/dosen.php" method="post" class="needs-validation" novalidate autocomplete="off">

                          <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <div class="mt-2"></div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkldtk1" value="L" required>
                              <label class="custom-control-label" for="jkldtk1">L</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkldtk2" value="P" required>
                              <label class="custom-control-label" for="jkldtk2">P</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Jenis Kepegawaian</label>
                            <div class="mt-2"></div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="custom-control-input" type="radio" name="kepegawaian" id="kpg1" value="Dosen" required>
                              <label class="custom-control-label" for="kpg1">Dosen</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="custom-control-input" type="radio" name="kepegawaian" id="kpg2" value="Tendik" required>
                              <label class="custom-control-label" for="kpg2">Tendik</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" name="tambah" class="tmb tmb-primary">Tambah</button>
                          </div>
                          <hr>
                        </form>
                        <h5>Import Data</h5>
                          <form action="../proses/import/dtk.php" method="post" enctype="multipart/form-data">
                              <input type="file" name="file_excel" class="form-control">
                              <div class="form-group mt-4">
                                <a>
                                  <button type="submit" class="tmb tmb-info mb-2" name="import"><em class="fas fa-upload"> </em> Import</button>
                                </a>
                                <a><button onclick="javascript:window.location.href='../assets/template-import-dtk.xlsx'" type="button" class="tmb tmb-warning mb-2"><em class="fas fa-download"></em> Download Template</button></a>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }elseif($akses['data_gtk'] == "N")
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
  $(document).ready(function(){
    $('.edit_dtk').on('click', function() {
      var id = $(this).data('id');
      $.ajax(
        {
        url: 'ajax/update_dtk.php',
        type: 'post',
        data: {id:id},
        success:function(respond)
        {
          $("#update_dtk").modal('show');
          $("#form-dtk").html(respond);
        }
        }
      );
    });
  });
</script>