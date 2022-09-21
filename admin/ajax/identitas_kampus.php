<?php
  require '../../koneksi/koneksi.php';
  $query_identitas = mysqli_query($koneksi, "SELECT * FROM identitas_kampus");
  $kampus = mysqli_fetch_assoc($query_identitas);
?>

<form id="form-identitas" enctype="multipart/form-data" method="post">
  <div class="row">
    <div class="col-sm-4">
      <div class="card-body">
        <input type="text" name="id" value="<?= $kampus['id'] ?>" style="display:none;">
        <label class="mt-2">Kode PT</label>
        <input type="text" name="kode_pt" id="" class="form-control mt-2" value="<?= $kampus['kode_pt'] ?>">
        <label class="mt-2">Nama Kampus</label>
        <input type="text" name="nama_kampus" value="<?= $kampus['nama_kampus'] ?>" class="form-control mt-2">
        <label class="mt-2">Nama Ketua / Rektor</label>
        <input type="text" name="nama_ketua" id="" class="form-control mt-2" value="<?= $kampus['nama_ketua'] ?>">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card-body">
        <label class="mt-2">NIP</label>
        <input type="text" name="nip" value="<?= $kampus['nip'] ?>" class="form-control mt-2">
        <label class="mt-2">Alamat Jalan</label>
        <textarea class="form-control" name="alamat_kampus" cols="30" rows="3"><?= $kampus['alamat_kampus'] ?></textarea>
        <label class="mt-2">Kelurahan</label>
        <input type="text" name="kelurahan" value="<?= $kampus['kelurahan'] ?>" class="form-control mt-2">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card-body">
        <label class="mt-2">Kecamatan</label>
        <input type="text" name="kecamatan" value="<?= $kampus['kecamatan'] ?>" class="form-control mt-2">
        <label class="mt-2">Kab / Kota</label>
        <input type="text" name="kab_kota" id="" class="form-control mt-2" value="<?= $kampus['kab_kota'] ?>">
        <label class="mt-2">Akreditasi</label>
        <input type="text" name="akreditasi" value="<?= $kampus['akreditasi'] ?>" class="form-control mt-2">
        <label class="mt-2">Logo</label>
        <img src="../assets/logo/<?= $kampus['logo'] ?>" width="120">
        <input type="file" name="logo" id="logo" class="form-control mt-2">

        <div class="mt-3"></div>

        <button type="button" id="save" class="tmb tmb-primary"><em class="fas fa-save"></em> Save Data</button>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery/js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#save').click(function(){
      var form = $('#form-identitas')[0];
      var data = new FormData(form);

      $.ajax({
        url: 'ajax/update_data_kampus.php',
            type: 'post',
            enctype: 'multipart/form-data',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data){
              $("#validasi").load('ajax/validasi.php');
              $("#identitas_kampus").load('ajax/identitas_kampus.php');
            }
      });
    });
  });

  window.setTimeout(function(){
    $("#auto-close").fadeTo(500,0).slideUp(500, function(){
        $(this).remove();
    });
  }, 5000);
</script>