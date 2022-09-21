<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['login']))
  {
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password'])));

    $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password' UNION SELECT * FROM dosen WHERE username='$username' AND password='$password'");

    $cek_akun = mysqli_num_rows($select);

    if($cek_akun > 0)
    {
      $data = mysqli_fetch_assoc($select);

      $_SESSION['username'] = $data['username'];
      $_SESSION['log_status'] = "Oke";
      header('location: ../');
    }else{
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white text-alert"><em class="fas fa-times-circle"></em> Username Atau Password Anda Salah !</div>';
      header('location: ./');
    }
  }
?>