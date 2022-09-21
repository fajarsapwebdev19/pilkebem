<div class="pcoded-content">
  <div class="page-header card">
    <div class="row align-items-end">
      <div class="col-md-12 col-xl-12">
        <div class="mt-4">
          <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10">
              <div class="card">
                <div class="card-body">
                  <form action="../proses/ubah/password.php" method="post" class="needs-validation" novalidate autocomplete="off">
                    <?php
                      if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                      {
                        echo $_SESSION['val'];
                        unset($_SESSION['val']);
                      }
                    ?>
                    <div class="form-group">
                      <label for="">Password Lama</label>
                      <input type="password" name="password_lama" class="form-control" required>
                      <div class="invalid-feedback">Password Lama Kosong !</div>
                    </div>
                    <div class="form-group">
                      <label for="">Password Baru</label>
                      <input type="password" name="password_baru" class="form-control" required>
                      <div class="invalid-feedback">Password Baru Kosong !</div>
                    </div>
                    <div class="form-group">
                      <label for="">Konfirmasi Password Baru</label>
                      <input type="password" name="konfirmasi_password" class="form-control" required>
                      <div class="invalid-feedback">Konfirmasi Password Baru Kosong !</div>
                    </div>
                    <input type="text" name="username" value="<?= $data['username'] ?>" style="display: none;">
                    <div class="form-group">
                      <button type="submit" name="update_password" class="tmb tmb-info"><em class="fas fa-key"></em> Update Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>