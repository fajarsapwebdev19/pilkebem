<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['kirim_vote']))
  {
    $no_kandidat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kandidat'])));
    $nama_kandidat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_kandidat'])));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
    $kehadiran = "Hadir";
    $status_pemilihan = "Sudah";

    $data_user = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username' UNION SELECT * FROM dosen WHERE username='$username'");

    $user = mysqli_fetch_assoc($data_user);

    if($user['level'] == "Mahasiswa")
    {
      $vote = mysqli_query($koneksi, "UPDATE mahasiswa SET kehadiran='$kehadiran', status_memilih='$status_pemilihan' WHERE username='$username'");
      $vote .= mysqli_query($koneksi, "INSERT INTO view_pemilihan VALUES(NULL, '$no_kandidat','$nama_kandidat','$username')");
    }
    elseif($user['level'] == "Dosen")
    {
      $vote = mysqli_query($koneksi, "UPDATE dosen SET kehadiran='$kehadiran', status_memilih='$status_pemilihan' WHERE username='$username'");
      $vote .= mysqli_query($koneksi, "INSERT INTO view_pemilihan VALUES(NULL, '$no_kandidat','$nama_kandidat','$username')");
    }

    if($vote)
    {
      header('location: ../../user/?page=success');
    }
    
  }elseif(isset($_POST['sudah_vote']))
  {
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-info bg-info"><em class="fas fa-info-circle"></em> Anda Tidak Bisa Memilih Karena Sudah Pernah Memilih ! Jika Mau Ulang Memilih Silahkan Lapor Ke Admin Untuk Meriset Data Pemilihan Anda. Terima Kasih</div>';
    header('location: ../../user/');
  }
?>