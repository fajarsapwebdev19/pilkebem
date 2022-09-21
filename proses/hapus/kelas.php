<?php
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['hapus']))
  {
   if(isset($_POST['id']))
   {
     $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
     
     $delete = mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id='$id'");
     $delete .= mysqli_query($koneksi, "ALTER TABLE tb_kelas AUTO_INCREMENT = 1");

     if($delete)
     {
       $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Hapus Data </div>';
       header('location: ../../admin/?page=data_kelas');
     }
   } 
  }
?>