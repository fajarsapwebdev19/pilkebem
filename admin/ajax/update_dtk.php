<?php
  require '../../koneksi/koneksi.php';
  $id = mysqli_real_escape_string($koneksi, $_POST['id']);
  $dtk = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id='$id'");
  foreach($dtk as $data);
?>
<div class="modal-body">
  <input type="text" name="id" value="<?= $data['id'] ?>" style="display: none;">
  <input type="text" name="username_lama" value="<?= $data['username'] ?>" style="display: none;">
  <div class="form-group">
    <label for="">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="text" name="password" class="form-control" value="<?= $data['password'] ?>">
  </div>
  <div class="form-group">
    <label for="">Jenis Kelamin</label>
    <div class="mb-2">
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkldtk1" value="L" <?php if($data['jenis_kelamin'] == "L"){echo 'checked'; } ?>>
        <label class="custom-control-label" for="jkldtk1">L</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkldtk2" value="P" <?php if($data['jenis_kelamin'] == "P"){echo 'checked'; } ?>>
        <label class="custom-control-label" for="jkldtk2">P</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="">Jenis Kepegawaian</label>
    <div class="mb-2">
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="kepegawaian" id="kpw1" value="Dosen" <?php if($data['kepegawaian'] == "Dosen"){echo 'checked'; }?>>
        <label class="custom-control-label" for="kpw1">Dosen</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="kepegawaian" id="kpw2" value="Tendik" <?php if($data['kepegawaian'] == "Tendik"){echo 'checked'; }?>>
        <label class="custom-control-label" for="kpw2">Tendik</label>
      </div>
    </div>
  </div>
  <input type="text" name="username_lama" value="<?= $data['username']?>" style="display: none;">
</div>
<div class="modal-footer">
  <button type="submit" name="ubah" class="tmb tmb-info"><em class="fas fa-edit"></em>Edit</button>
</div>