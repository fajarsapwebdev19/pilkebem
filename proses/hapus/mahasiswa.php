<?php
  session_start();
  require('../../koneksi/koneksi.php');
  if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $username_lama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username_lama'])));

    $select = mysqli_query($koneksi, "SELECT * FROM view_pemilihan WHERE username='$username_tujuan'");
    $cek_data = mysqli_num_rows($select);

    if($cek_data > 0)
    {
      $delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE username='$username'");
      $delete .= mysqli_query($koneksi, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1");
      $delete .= mysqli_query($koneksi, "ALTER TABLE view_pemilihan AUTO_INCREMENT = 1");
      $delete .= mysqli_query($koneksi, "DELETE FROM view_pemilihan WHERE username='$username_tujuan'");
    }
    else
    {
      $delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE username='$username'");
      $delete .= mysqli_query($koneksi, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1");
    }

    if($delete)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Hapus Data</div>';
      header('location: ../../admin/?page=data_mahasiswa');
    }
  }
?>