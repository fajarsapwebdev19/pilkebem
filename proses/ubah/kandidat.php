<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['update']))
  {
    if(isset($_POST['nomor_kandidat']))
    {
      $nomor_kandidat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nomor_kandidat'])));
      $nama_ketua = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ketua'])));
      $nama_wakil = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_wakil'])));
      $visi = mysqli_real_escape_string($koneksi, trim($_POST['visi']));
      $misi = mysqli_real_escape_string($koneksi, trim($_POST['misi']));
      $foto_kandidat = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_kandidat']['name']));
      $tmp_foto = $_FILES['foto_kandidat']['tmp_name'];
      $size = $_FILES['foto_kandidat']['size'];
      $ekstensi = array('jpg','jpeg','png');
      $ex = pathinfo($foto_kandidat, PATHINFO_EXTENSION);

      if(empty($_FILES['foto_kandidat']['name']))
      {
          $update = mysqli_query($koneksi, "UPDATE tb_kandidat SET nama_ketua='$nama_ketua', nama_wakil='$nama_wakil', visi='$visi', misi='$misi' WHERE nomor_kandidat='$nomor_kandidat'");
      }else{
        if($size > 5000000)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Ukuran Melebihi 5 MB</div>';
          header('location: ../../admin/?page=data_kandidat');
        }else{
          if(!in_array($ex, $ekstensi))
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-warn"><em class="fas fa-times-circle"></em> Ektensi Tidak Mendukung !</div>';
            header('location: ../../admin/?page=data_kandidat');
          }else{
            $select = mysqli_query($koneksi, "SELECT * FROM tb_kandidat WHERE nomor_kandidat='$nomor_kandidat'");
            $data = mysqli_fetch_assoc($select);
            $foto_lama = $data['foto_kandidat'];
            unlink('../../assets/upload/'.$foto_lama);

            $rename = rand().'_'.$foto_kandidat;
            $dir = '../../assets/upload/'.$rename;
            move_uploaded_file($tmp_foto, $dir);

            $update = mysqli_query($koneksi, "UPDATE tb_kandidat SET nama_ketua='$nama_ketua', nama_wakil='$nama_wakil', visi='$visi', misi='$misi', foto_kandidat='$rename' WHERE nomor_kandidat='$nomor_kandidat'");
          }
        }
      }
       if($update)
       {
         $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil Update Data ! </div>';
         header('location: ../../admin/?page=data_kandidat');
       }
    }
  }
?>