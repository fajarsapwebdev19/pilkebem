<?php
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['save']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $manajemen_akun = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['manajemen_akun'])));
      $data_kelas = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['data_kelas'])));
      $data_siswa = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['data_siswa'])));
      $data_gtk = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['data_gtk'])));
      $data_kandidat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['data_kandidat'])));
      $rekap_data = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['rekap_data'])));
      $reset_all = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['reset_all'])));
      $reset_peserta = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['reset_peserta'])));

      $akses_menu = mysqli_query($koneksi, "UPDATE akses_menu SET manajemen_akun='$manajemen_akun', data_kelas='$data_kelas', data_siswa='$data_siswa', data_gtk='$data_gtk', data_kandidat='$data_kandidat', rekap_data='$rekap_data', reset_all='$reset_all', reset_peserta='$reset_peserta' WHERE username='$username'");

      if($akses_menu)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success text-white bg-success"><em class="fas fa-check-circle"></em> Hak Akses Berhasil Di Atur </div>';
        header('location: ../../admin/?page=account');
      }
    }
  }
?>