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
        <form action="../proses/hapus/kelas.php" method="post">
          <p class="text-center">Apakah Anda Yakin Ingin Menghapus Data Tersebut ?</p>
          <input type="text" name="id" value="<?= $data['id']?>" style="display: none;">
          <div class="modal-footer justify-content-center">
            <button type="submit" name="hapus" class="tmb tmb-success">Ya</button>
            <button type="button" class="tmb tmb-danger" data-dismiss="modal">Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>