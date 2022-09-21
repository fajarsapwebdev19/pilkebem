<?php
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['tambah']))
  {
    $nama_mahasiswa = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_mahasiswa'])));
    $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
    $kelas = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kelas'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password'])));
    $kehadiran = "Tidak Hadir";
    $status_memilih = "Belum";
    $status_akun = "Y";
    $level = "Mahasiswa";

    $add = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES(NULL, '$nama_mahasiswa','$jenis_kelamin', '$kelas', '$username', '$password', '$kehadiran', '$status_memilih', '$status_akun', '$level')");

    if($add)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Tambah Data !</div>';
      header('location: ../../admin/?page=data_mahasiswa');
    }

  }
?>