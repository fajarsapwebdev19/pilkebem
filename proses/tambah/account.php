<?php
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['tambah']))
  {
    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
    $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password'])));
    $status_akun = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['status_akun'])));
    $foto = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['foto'])));
    $level = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['level'])));
    
    $add_account = mysqli_query($koneksi, "INSERT INTO admin VALUES(NULL, '$nama','$jenis_kelamin','$username','$password','$status_akun','$foto','$level')");

    $add_account .= mysqli_query($koneksi, "INSERT INTO akses_menu VALUES(NULL, 'N','N','N','N','N','N','N','N','$username')");

    if($add_account)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><em class="fas fa-check-circle"></em> Berhasil Tambah Admin !</div>';
      header('location: ../../admin/?page=account');
    }

  }
?>