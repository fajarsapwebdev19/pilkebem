<!-- modal edit kandidat -->
<div class="modal fade" id="update<?= $data['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Data Kandidat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../proses/ubah/kandidat.php" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label for="no">Nomor Urut</label>
            <input type="text" name="nomor_kandidat" class="form-control" id="no" value="<?= $data['nomor_kandidat']?>" readonly>
            <div class="invalid-feedback">Nomor Kandidat Tidak Boleh Kosong</div>
          </div>
          <div class="form-group">
            <label for="ketua">Nama Ketua</label>
            <input type="text" name="nama_ketua" class="form-control" id="ketua" value="<?= $data['nama_ketua']?>">
            <div class="invalid-feedback">Nama Ketua Tidak Boleh Kosong</div>
          </div>
          <div class="form-group">
            <label for="wakil">Nama Wakil</label>
            <input type="text" name="nama_wakil" class="form-control" id="wakil" value="<?= $data['nama_wakil']?>">
            <div class="invalid-feedback">Nama Wakil Tidak Boleh Kosong</div>
          </div>
          <div class="form-group">
            <label for="visi">Visi</label>
            <textarea name="visi" id="edit" class="form-control  edit" rows="5"><?= $data['visi']?></textarea>
            <div class="invalid-feedback">Visi Tidak Boleh Kosong</div>
          </div>
          <div class="form-group">
            <label for="misi">Misi</label>
            <textarea name="misi" id="edit" class="form-control edit" rows="5"><?= $data['misi']?></textarea>
            <div class="invalid-feedback">Misi Tidak Boleh Kosong</div>
          </div>
          <div class="form-group">
            <label for="foto_kandidat">Foto Kandidat</label>
            <input type="file" name="foto_kandidat" id="foto_kandidat" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="update" class="tmb tmb-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal edit kandidat -->
<div class="modal fade" id="delete<?= $data['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../proses/hapus/kandidat.php" method="post">
          <input type="text" name="id" value="<?= $data['id'] ?>" style="display: none;">
          <p class="text-center">Apakah Anda Yakin Ingin Hapus Data Kandidat : <br>
          <?= $data['nama_ketua']?> Dan <?= $data['nama_wakil']?>
          </p>
          <div class="mt-3 text-center">
            <button type="submit" name="delete" class="tmb tmb-success">Ya</button>
            <button type="button" data-dismiss="modal" class="tmb tmb-danger">Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>