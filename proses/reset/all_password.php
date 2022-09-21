<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['reset_all_mhs']))
  {
    if(isset($_POST['level']))
    {
      $level = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['level']));
      $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_baru']));

      $update_password = mysqli_query($koneksi, "UPDATE mahasiswa SET password='$password_baru' WHERE level='$level'");

      if($update_password)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success text-white bg-success"><em class="fas fa-check-circle"></em> Berhasil, Reset Password Mahasiswa !</div>';
        header('location: ../../admin/?page=data_mahasiswa');
      }
    }
  }elseif(isset($_POST['reset_all_dsn']))
  {
    if(isset($_POST['level']))
    {
      $level = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['level']));
      $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_baru']));

      $update_password = mysqli_query($koneksi, "UPDATE dosen SET password='$password_baru' WHERE level='$level'");

      if($update_password)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><em class="fas fa-check-circle"></em> Berhasil, Reset Password Dosen !</div>';
        header('location: ../../admin/?page=data_dtk');
      }
    }
  }
?>