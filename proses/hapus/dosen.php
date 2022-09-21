<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $username_tujuan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username_tujuan'])));

    $query_dtk = mysqli_query($koneksi, "SELECT * FROM view_pemilihan WHERE username='$username_tujuan'");
    $cek_dtk = mysqli_num_rows($query_dtk);

    if($cek_dtk > 0)
    {
      $delete = mysqli_query($koneksi, "DELETE FROM dosen WHERE username='$username'");
      $delete .= mysqli_query($koneksi, "DELETE FROM view_pemilihan WHERE username='$username_tujuan'");
      $delete .= mysqli_query($koneksi, "ALTER TABLE dosen AUTO_INCREMENT = 1");
      $delete .= mysqli_query($koneksi, "ALTER TABLE view_pemilihan AUTO_INCREMENT = 1");
    }
    else
    {
      $delete = mysqli_query($koneksi, "DELETE FROM dosen WHERE username='$username'");
      $delete .= mysqli_query($koneksi, "ALTER TABLE dosen AUTO_INCREMENT = 1");
    }
    
    if($delete)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Hapus Data </div>';
      header('location: ../../admin/?page=data_dtk');
    }

  }
?>