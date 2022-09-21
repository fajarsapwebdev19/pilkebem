<?php
  session_start();
  require '../../koneksi/koneksi.php';

    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

    $query_data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username' UNION SELECT * FROM dosen WHERE username='$username'");
    $data = mysqli_fetch_assoc($query_data);
    $cek_data = mysqli_num_rows($query_data);

    if($cek_data > 0)
    {
      if($data['status_memilih'] == "Belum")
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Peserta Belum Melakukan Pemilihan </div>';
      }
      elseif($data['status_memilih'] == "Sudah")
      {
        if($data['level'] == "Dosen")
        {
          $res = mysqli_query($koneksi, "UPDATE dosen SET kehadiran='Tidak Hadir', status_memilih='Belum' WHERE username='$username'");
          $res .= mysqli_query($koneksi, "DELETE FROM view_pemilihan WHERE username='$username'");
        }
        elseif($data['level'] == "Mahasiswa")
        {
          $res = mysqli_query($koneksi, "UPDATE mahasiswa SET kehadiran='Tidak Hadir', status_memilih='Belum' WHERE username='$username'");
          $res .= mysqli_query($koneksi, "DELETE FROM view_pemilihan WHERE username='$username'");
        } 
      }
    }
    else{
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Username Tidak Ditemukan !</div>';
    }

    if($res)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Reset Akun Pengguna !</div>';
    }
?>