<?php
  session_start(); 
  require ('../../koneksi/koneksi.php');

  if(isset($_POST['ubah'])){
    if(isset($_POST['id'])){
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
      $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
      $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $kelas = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kelas'])));
      $username_lama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username_lama'])));

      $select = mysqli_query($koneksi, "SELECT * FROM view_pemilihan WHERE username='$username_lama'");

      $cek_data = mysqli_num_rows($select);

      if($cek_data > 0)
      {
        $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', username='$username', password='$password', kelas='$kelas' WHERE id='$id'");

        $update .= mysqli_query($koneksi, "UPDATE view_pemilihan SET username='$username' WHERE username='$username_lama'");
      }else{
        $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', username='$username', password='$password', kelas='$kelas' WHERE id='$id'");
      }

      if($update)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Edit Data Berhasil  </div>';
        header('location: ../../admin/?page=data_mahasiswa');
      }
      
      
    }
  }
?>