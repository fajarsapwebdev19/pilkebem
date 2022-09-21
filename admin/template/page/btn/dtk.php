<!-- hapus dosen dan tenaga pendidik-->
<div class="modal fade" id="hapus<?= $data['id'] ?>" data-backdrop="static" data-keyboard="true" tabindex="-0" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus DTK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">Apakah Anda Yakin Ingin Menghapus Semua Data ? </p>
        <p class="text-center"><b style="font-weight: 800;"><?= $data['nama'] ?></b></p>
        <form action="../proses/hapus/dosen.php" method="post">
          <input type="text" name="id" value="<?= $data['id'] ?>" style="display: none;">
          <input type="text" name="username" value="<?= $data['username'] ?>" style="display: none;">
          <input type="text" name="username_tujuan" value="<?= $data['username'] ?>" style="display: none;">
          <div class="modal-footer justify-content-center">
            <button type="submit" name="hapus" class="tmb tmb-success"><em class="fas fa-check"></em> Ya </button>
            <button class="tmb tmb-danger" data-dismiss="modal"><em class="fas fa-times"></em> Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end hapus dosen dan tenaga pendidik -->

<!-- edit dosen dan tenaga pendidik -->
<div class="modal fade" id="update_dtk" data-backdrop="static" data-keyboard="false" tabindex="-5" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit DTK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-dtk" action="../proses/ubah/dosen.php" method="post" autocomplete="off">
      </form>
    </div>
  </div>
</div>
<!-- end edit data dosen dan tenaga pendidik -->