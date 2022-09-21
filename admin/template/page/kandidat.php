<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <h5>Data Kandidat</h5>
        <div class="mt-4">
          <?php
            if($akses['data_kandidat'] == "Y")
            {
              ?>
                <div class="row">
                  <div class="col-sm-8 col-md-8">
                    <div class="card">
                      <div class="card-header bg-header">
                        Data Kandidat
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-sm table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">Nomor Urut</th>
                                <th class="text-center">Nama Ketua Dan Wakil Ketua</th>
                                <th class="text-center">Foto Kandidat</th>
                                <th class="text-center">Visi Dan Misi</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $query_kandidat = mysqli_query($koneksi, "SELECT * FROM tb_kandidat ORDER BY nomor_kandidat ASC");
                                foreach($query_kandidat as $data):
                              ?>
                                <tr>
                                  <td class="text-center"><?= $data['nomor_kandidat']?></td>
                                  <td><?= $data['nama_ketua']?> Dan <?= $data['nama_wakil']?></td>
                                  <td class="text-center"><img src="../assets/upload/<?= $data['foto_kandidat']?>" width="80"></td>
                                  <td>
                                    <p><b class="text-bold">Visi</b></p>
                                    <p>
                                      <?= $data['visi']?>
                                    </p>
                                    <p><b class="text-bold">Misi</b></p>
                                    <p>
                                      <?= $data['misi']?>
                                    </p>
                                  </td>
                                  <td class="text-center">
                                    <a data-target="#update<?= $data['id'] ?>" data-toggle="modal">
                                      <button class="tmb tmb-sm tmb-primary"><em class="fas fa-edit"></em>  Update</button>
                                    </a> 
                                    <a data-target="#delete<?= $data['id'] ?>" data-toggle="modal">
                                      <button class="tmb tmb-sm tmb-danger"><em class="fas fa-trash"></em>  Delete</button>
                                    </a>
                                  </td>
                                </tr>
                                <?php
                                  require 'btn/kandidat.php';
                                ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                    <div class="card">
                      <div class="card-header bg-header">
                        Input Data Kandidat
                      </div>
                      <div class="card-body">
                        <?php
                          if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                          {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                          }
                        ?>
                        <form action="../proses/tambah/kandidat.php" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
                          <div class="form-group">
                            <label for="no">Nomor Urut</label>
                            <input type="text" name="nomor_kandidat" class="form-control" id="no" required>
                            <div class="invalid-feedback">Nomor Kandidat Tidak Boleh Kosong</div>
                          </div>
                          <div class="form-group">
                            <label for="ketua">Nama Ketua</label>
                            <input type="text" name="nama_ketua" class="form-control" id="ketua"  required>
                            <div class="invalid-feedback">Nama Ketua Tidak Boleh Kosong</div>
                          </div>
                          <div class="form-group">
                            <label for="wakil">Nama Wakil</label>
                            <input type="text" name="nama_wakil" class="form-control" id="wakil"  required>
                            <div class="invalid-feedback">Nama Wakil Tidak Boleh Kosong</div>
                          </div>
                          <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea name="visi" class="form-control edit" rows="5" required></textarea>
                            <div class="invalid-feedback">Visi Tidak Boleh Kosong</div>
                          </div>
                          <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea name="misi" class="form-control edit" rows="5" required></textarea>
                            <div class="invalid-feedback">Misi Tidak Boleh Kosong</div>
                          </div>
                          <div class="form-group">
                            <label for="foto_kandidat">Foto Kandidat</label>
                            <input type="file" name="foto_kandidat" id="foto_kandidat" class="form-control">
                          </div>
                          <div class="form-group mt-3">
                            <button type="submit" name="add" class="tmb tmb-info">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }elseif($akses['data_kandidat'] == "N")
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