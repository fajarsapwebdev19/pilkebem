<?php
    require '../../koneksi/koneksi.php';

    $id_mhs = mysqli_real_escape_string($koneksi, $_POST['id_mhs']);
    $get_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id_mhs'");
    $data = mysqli_fetch_assoc($get_mahasiswa);
?>
<div class="modal-body">
    <input type="text" name="id" value="<?= $data['id']?>" style="display: none;">
    <input type="text" name="username_lama" value="<?= $data['username']?>" style="display: none;">
    <div class="form-group">
        <label for="">NIM</label>
        <input type="text" name="username" class="form-control" value="<?= $data['username']?>">
    </div>
    <div class="form-group">
        <label for="">Nama Mahasiswa</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama']?>">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="password" class="form-control" value="<?= $data['password']?>">
    </div>
    <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <div class="mb-2">
            <div class="custom-control custom-radio custom-control-inline">
                <input class="custom-control-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" <?php if($data['jenis_kelamin'] == "L"){echo 'checked'; }?>>
                <label class="custom-control-label" for="inlineRadio1">L</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input class="custom-control-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" <?php if($data['jenis_kelamin'] == "P"){echo 'checked'; }?>>
                <label class="custom-control-label" for="inlineRadio2">P</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <select name="kelas" class="form-control">
            <option value="">Pilih</option>
            <?php
                $selected = $data['kelas'];
                $query_kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                foreach ($query_kelas as $data) :
            ?>
                <option <?php if($data['nama_kelas'] == $selected){echo 'selected'; } ?>><?= $data['nama_kelas'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" name="ubah" class="tmb tmb-info"><em class="fas fa-edit"></em>Edit</button>
</div> 