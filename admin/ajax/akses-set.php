<?php
  require '../../koneksi/koneksi.php';
  $id = mysqli_real_escape_string($koneksi, $_POST['id']);

  $get_user = mysqli_query($koneksi, "SELECT * FROM admin INNER JOIN akses_menu ON admin.id = akses_menu.id WHERE akses_menu.id='$id'");
  $data = mysqli_fetch_assoc($get_user);
?>
<div class="modal-body">
  <input type="hidden" name="username" value="<?= $data['username']; ?>">
  <div class="form-group">
      <label for="">Manajemen Akun</label>
      <div class="mb-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="maccount1" name="manajemen_akun" class="custom-control-input" value="Y" <?php if($data['manajemen_akun'] == "Y"){echo 'checked';}?>>
            <label class="custom-control-label" for="maccount1">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="maccount2" name="manajemen_akun" class="custom-control-input" value="N" <?php if($data['manajemen_akun'] == "N"){echo 'checked';}?>>
            <label class="custom-control-label" for="maccount2">Tidak</label>
        </div>
      </div>
  </div>
  <div class="form-group">
      <label for="">Data Kelas</label>
      <div class="mb-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" name="data_kelas" id="data_kelas1" class="custom-control-input" value="Y" <?php if($data['data_kelas'] == "Y"){echo 'checked';}?>>
            <label class="custom-control-label" for="data_kelas1">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" name="data_kelas" id="data_kelas2" class="custom-control-input" value="N" <?php if($data['data_kelas'] == "N"){echo 'checked';}?>>
            <label class="custom-control-label" for="data_kelas2">Tidak</label>
        </div>
      </div>
  </div>
  <div class="form-group">
      <label for="">Data Mahasiswa</label>
      <div class="mb-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="data_siswa" id="mhs1" value="Y" <?php if($data['data_siswa'] == "Y"){ echo 'checked'; } ?>>
            <label class="custom-control-label" for="mhs1">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="data_siswa" id="mhs2" value="N" <?php if($data['data_siswa'] == "N"){ echo 'checked'; } ?>>
            <label class="custom-control-label" for="mhs2">Tidak</label>
        </div>
      </div>
  </div>
  <div class="form-group">
      <label for="">Data DTK</label>
      <div class="mb-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="data_gtk" id="dtk1" value="Y" <?php if($data['data_gtk'] == "Y"){ echo 'checked'; } ?>>
            <label class="custom-control-label" for="dtk1">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="data_gtk" id="dtk2" value="N" <?php if($data['data_gtk'] == "N"){echo 'checked'; }?>>
            <label class="custom-control-label" for="dtk2">Tidak</label>
        </div>
      </div>
  </div>
  <div class="form-group">
      <label for="">Data Kandidat</label>
      <div class="mb-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="data_kandidat" id="dk1" value="Y" <?php if($data['data_kandidat'] == "Y"){ echo 'checked'; } ?>>
            <label class="custom-control-label" for="dk1">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="data_kandidat" id="dk2" value="N" <?php if($data['data_kandidat'] == "N"){echo 'checked'; }?>>
            <label class="custom-control-label" for="dk2">Tidak</label>
        </div>
      </div>
  </div>
  <div class="form-group">
    <label for="">Rekap Data</label>
    <div class="mb-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="rekap_data" id="rkp1" value="Y" <?php if($data['rekap_data'] == "Y"){ echo 'checked'; } ?>>
            <label class="custom-control-label" for="rkp1">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="rekap_data" id="rkp2" value="N" <?php if($data['rekap_data'] == "N"){echo 'checked'; }?>>
            <label class="custom-control-label" for="rkp2">Tidak</label>
        </div>
    </div>
  </div>
  <div class="form-group">
      <label for="">Reset Peserta</label>
      <br>
      <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" name="reset_peserta" id="rstpst1" value="Y" <?php if($data['reset_peserta'] == "Y"){ echo 'checked'; } ?>>
          <label class="custom-control-label" for="rstpst1">Ya</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" name="reset_peserta" id="rstpst2" value="N" <?php if($data['reset_peserta'] == "N"){echo 'checked'; }?>>
          <label class="custom-control-label" for="rstpst2">Tidak</label>
      </div>
  </div>
  <div class="form-group">
      <label for="">Reset Semua Data</label>
      <br>
      <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" name="reset_all" id="rstall1" value="Y" <?php if($data['reset_all'] == "Y"){ echo 'checked'; } ?>>
          <label class="custom-control-label" for="rstall1">Ya</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" name="reset_all" id="rstall2" value="N" <?php if($data['reset_all'] == "N"){echo 'checked'; }?>>
          <label class="custom-control-label" for="rstall2">Tidak</label>
      </div>
  </div>
</div>
<div class="modal-footer">
    <button type="submit" name="save" class="tmb tmb-primary"><em class="fas fa-save"></em> Save</button>
    <button type="button" class="tmb tmb-danger" data-dismiss="modal"><em class="fas fa-times"></em> Cancel</button>
</div>