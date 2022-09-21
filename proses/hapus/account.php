<?php
  session_start();
  require_once '../../koneksi/koneksi.php';

  if(isset($_POST['hapus']))
  {
    $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

    $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
    $data = mysqli_fetch_assoc($select);

    $foto_lama = $data['foto'];

    unlink('../../assets/img/'.$foto_lama);

    $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE id='$id'");
    $delete .= mysqli_query($koneksi, "DELETE FROM akses_menu WHERE username='$username'");
    $delete = mysqli_query($koneksi, "ALTER TABLE admin AUTO_INCREMENT=1");
    $delete = mysqli_query($koneksi, "ALTER TABLE akses_menu AUTO_INCREMENT=1");

    if($delete)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success text-white bg-success"><em class="fas fa-check-circle"></em> Berhasil Hapus Akun !</div>';
      header('location: ../../admin/?page=account');
    }
  }
?>