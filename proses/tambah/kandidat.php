<?php
  session_start();
  require '../../koneksi/koneksi.php';
  if(isset($_POST['add']))
  {
    $nomor_urut = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nomor_kandidat'])));
    $nama_ketua = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ketua'])));
    $nama_wakil = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_wakil'])));
    $visi = mysqli_real_escape_string($koneksi, trim($_POST['visi']));
    $misi = mysqli_real_escape_string($koneksi, trim($_POST['misi']));
    $foto_kandidat = rand().'_'.mysqli_real_escape_string($koneksi, $_FILES['foto_kandidat']['name']);
    $tmp_kandidat = $_FILES['foto_kandidat']['tmp_name'];
    $size = $_FILES['foto_kandidat']['size'];
    $ektension = array('jpg','png','jpeg');
    $ex = pathinfo($foto_kandidat, PATHINFO_EXTENSION);

    // jika foto kosong
    if(empty($_FILES['foto_kandidat']['name']))
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Foto Kandidat Kosong</div>';
      header('location: ../../admin/?page=data_kandidat');
    }
    else
    {
      // jika ukuran diatas 5 mb
      if($size > 5000000){
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Ukuran Melebihi 5 MB</div>';
        header('location: ../../admin/?page=data_kandidat');
      }else{
        // jika ektensi tidak sesuai dengan yang ditentukan (jpg.jpeg.png)
        if(!in_array($ex, $ektension)){
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-warn"><em class="fas fa-times-circle"></em> Ektensi Tidak Mendukung !</div>';
          header('location: ../../admin/?page=data_kandidat');
        }else{
          // tempat penyimpanan gambar yang akan di upload
          $dir = '../../assets/upload/'.$foto_kandidat;
          move_uploaded_file($tmp_kandidat, $dir);

          $add_kandidat = mysqli_query($koneksi, "INSERT INTO tb_kandidat VALUES(NULL, '$nomor_urut', '$nama_ketua','$nama_wakil','$visi','$misi','$foto_kandidat')");

          if($add_kandidat)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Tambah Data</div>';
            header('location: ../../admin/?page=data_kandidat');
          }
        }
      } 
    }
  }