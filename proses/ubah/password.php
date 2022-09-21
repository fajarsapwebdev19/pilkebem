<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['update_password']))
  {
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $password_lama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password_lama'])));
    $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password_baru'])));
    $konfirmasi_password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['konfirmasi_password'])));

    $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password_lama'");
    $cek_password_lama = mysqli_num_rows($select);

    if($cek_password_lama > 0)
    {
      if($password_baru == $konfirmasi_password){
        $update_password = mysqli_query($koneksi, "UPDATE admin SET password='$password_baru' WHERE username='$username'");

        if($update_password)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil ! Update Password</div>';
          header('location: ../../admin/?page=update_password');
        }
      }else{
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-warn"><em class="fas fa-times-circle"></em> Gagal ! Password Baru Tidak Sama</div>';
        header('location: ../../admin/?page=update_password');
      }
    }else{
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Password Lama Tidak Sesuai</div>';
      header('location: ../../admin/?page=update_password');
    }
  }
?>