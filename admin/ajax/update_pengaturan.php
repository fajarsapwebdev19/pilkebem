<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['id']))
  {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
      $tahun_ajaran = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tahun_ajaran'])));
      $tanggal_pelaksanaan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim(date('Y-m-d', strtotime($_POST['tanggal_pelaksanaan'])))));
      $sampai = mysqli_real_escape_string($koneksi, htmlspecialchars(trim(date('Y-m-d', strtotime($_POST['sampai'])))));

      $save = mysqli_query($koneksi, "UPDATE tb_informasi SET tahun_ajaran='$tahun_ajaran', tanggal_pelaksanaan='$tanggal_pelaksanaan', sampai='$sampai' WHERE id='$id'");

      if($save)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success text-white bg-success"><em class="fas fa-check-circle"></em> Berhasil Simpan Data</div>';
      }
  }
?>