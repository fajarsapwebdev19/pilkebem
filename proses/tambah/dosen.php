<?php
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['tambah']))
  {
    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
    $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
    $kepegawaian = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kepegawaian'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password'])));
    $kehadiran = "Tidak Hadir";
    $status_memilih = "Belum";
    $status_akun = "Y";
    $level = "Dosen";

    $add = mysqli_query($koneksi, "INSERT INTO dosen VALUES(NULL, '$nama','$jenis_kelamin','$kepegawaian','$username','$password','$kehadiran','$status_memilih','$status_akun','$level')");

    if($add)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Tambah Data !</div>';
      header('location: ../../admin/?page=data_dtk');
    }

  }
?>