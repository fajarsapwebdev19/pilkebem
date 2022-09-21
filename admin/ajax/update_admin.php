<?php
  require '../../koneksi/koneksi.php';
  $id = mysqli_real_escape_string($koneksi, $_POST['id']);
  $get_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
  $data = mysqli_fetch_assoc($get_admin);
?>
<div class="modal-body">
  <div class="form-group">
    <input type="text" name="id" value="<?= $data['id']?>" style="display: none;">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
  </div>
  <div class="form-group">
    <label class="form-label">Username</label>
    <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>">
  </div>
  <div class="form-group">
    <label class="form-label">Jenis Kelamin</label>
    <div class="mb-2">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="jk1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" <?php if($data['jenis_kelamin'] == "Laki-Laki"){echo 'checked'; }?>>
        <label class="custom-control-label" for="jk1">Laki-Laki</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="jk2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" <?php if($data['jenis_kelamin'] == "Perempuan"){echo 'checked';}?>>
        <label class="custom-control-label" for="jk2">Perempuan</label>
      </div>
    </div>
  </div>
  <div class="form-group">
  <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control" value="<?= $data['password'] ?>">
    <input type="text" name="username_lama" value="<?= $data['username']?>" style="display: none;">
  </div>
  <div class="form-group">
    <label class="form-label">Status Akun</label>
    <div class="mb-2">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="stsakn1" name="status_akun" class="custom-control-input" value="Y" <?php if($data['status_akun'] == "Y"){echo 'checked';} ?>>
        <label class="custom-control-label" for="stsakn1">Aktif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="stsakn2" name="status_akun" class="custom-control-input" value="N" <?php if($data['status_akun'] == "N"){echo 'checked'; } ?>>
        <label class="custom-control-label" for="stsakn2">Tidak Aktif</label>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="submit" name="ubah" class="tmb tmb-info">Update</button>
  <button type="button" class="tmb tmb-danger" data-dismiss="modal">Batal</button>
</div>
