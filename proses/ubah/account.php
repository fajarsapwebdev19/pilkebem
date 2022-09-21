<?php
  //proses update account
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['ubah']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
      $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
      $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password'])));
      $status_akun = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['status_akun'])));
      $username_lama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username_lama'])));

      //query update table admin
      $update = mysqli_query($koneksi, "UPDATE admin SET nama='$nama',jenis_kelamin='$jenis_kelamin',username='$username',password='$password', status_akun='$status_akun' WHERE id='$id'");

      // query update table akses_menu
      $update .= mysqli_query($koneksi, "UPDATE akses_menu SET username='$username' WHERE username='$username_lama'");

      // jika update berhasil maka akan menampilkan pesan sukses
      if($update)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><em class="fas fa-check-circle"></em> Berhasil Update Akun !</div>';
        header('location: ../../admin/?page=account');
      }
    }
  }
?>