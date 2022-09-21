<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['delete']))
  {
    $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));

    $database_data = mysqli_query($koneksi, "SELECT * FROM tb_kandidat WHERE id='$id'");
    $data = mysqli_fetch_assoc($database_data);

    $foto_clean = $data['foto_kandidat'];

    unlink('../../assets/upload/'.$foto_clean);
    $delete = mysqli_query($koneksi, "DELETE FROM tb_kandidat WHERE id='$id'");
    $delete .= mysqli_query($koneksi, "ALTER TABLE tb_kandidat AUTO_INCREMENT = 1");

    if($delete)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Hapus Data !</div>';
      header('location: ../../admin/?page=data_kandidat');
    }
  }
?>