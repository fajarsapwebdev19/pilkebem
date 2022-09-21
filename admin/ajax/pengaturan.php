<!-- query data informasi -->
<?php
require '../../koneksi/koneksi.php';
$query_informasi = mysqli_query($koneksi, "SELECT * FROM tb_informasi");
$data_informasi = mysqli_fetch_assoc($query_informasi);
?>
<!-- end query data informasi -->
<form id="form-pengaturan" method="post">
  <input type="text" name="id" value="<?= $data_informasi['id'] ?>" style="display: none;">
  <div class="form-group">
    <label class="mt-2">Tahun Masa Bakti</label>
    <input type="text" name="tahun_ajaran" class="mt-2 form-control" value="<?= $data_informasi['tahun_ajaran'] ?>">
  </div>

  <div class="form-group">
    <label for="">Tanggal Pelaksanaan</label>
    <input type="text" name="tanggal_pelaksanaan" id="tanggal" class="mt-2 form-control tanggal" value="<?= date('d-m-Y', strtotime($data_informasi['tanggal_pelaksanaan'])) ?>">
  </div>

  <div class="form-group">
    <label for="">Sampai</label>
    <input type="text" name="sampai" id="tanggal2" class="mt-2 form-control tanggal" value="<?= date('d-m-Y', strtotime($data_informasi['sampai'])) ?>">
  </div>


  <div class="mt-3">
    <button type="button" id="simpan" class="tmb tmb-success"><em class="fas fa-save"></em> Simpan
      Data</button>
  </div>
</form>

<script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery/js/jquery.min.js"></script>
<script src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function() {
    $("#simpan").on('click', function() {
      var data = $("#form-pengaturan").serialize();

      $.ajax({
        url: 'ajax/update_pengaturan.php',
        type: 'post',
        data: data,
        success:function(respond){
          $('#message-pengaturan').load('ajax/validasi.php');
          $('#pengaturan').load('ajax/pengaturan.php');
        }
      });
    });

    window.setTimeout(function(){
      $("#auto-close").fadeTo(500,0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
  });

  $(".tanggal").datepicker({
      format: 'dd-mm-yyyy',
      autoHighlight: true,
      autoClose: true
  });
</script>