<?php
  session_start();
  require '../../koneksi/koneksi.php';
  if(isset($_POST['update_foto']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $foto_profile = mysqli_real_escape_string($koneksi, $_FILES['foto_profile']['name']);
      $tmp_foto = $_FILES['foto_profile']['tmp_name'];
      $size = $_FILES['foto_profile']['size'];
      $ektensi = array('jpg','jpeg','png');
      $ex = pathinfo($foto_profile, PATHINFO_EXTENSION);

      if(empty($_FILES['foto_profile']['name']))
      {
        $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
        $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));

        $update = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', jenis_kelamin='$jenis_kelamin' WHERE username='$username'");

        if($update){
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><em class="fas fa-check-circle"></em> Berhasil, Update Data</div>';
          header('location: ../../admin/?page=profile');
        }
        
      }else{
        if(!in_array($ex, $ektensi))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Ektensi Hanya Jpg,Jpeg Dan Png</div>';
          header('location: ../../admin/?page=profile');
        }else{
          if($size > 3000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Ukuran File Di Atas 3 Mb</div>';
            header('location: ../../admin/?page=profile');
          }else{
            $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
            $data_admin = mysqli_fetch_assoc($select);

            $foto_database = $data_admin['foto'];

            unlink('../../assets/img/'.$foto_database);

            $rename = rand().'_'.$foto_profile;
            $dir = '../../assets/img/'.$rename;
            move_uploaded_file($tmp_foto, $dir);

            $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
            $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));

            $update_foto = mysqli_query($koneksi, "UPDATE admin SET nama='$nama',jenis_kelamin='$jenis_kelamin',foto='$rename' WHERE username='$username'");

            if($update_foto)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Berhasil ! Update Foto</div>';
              header('location: ../../admin/?page=profile');
            }
          }
        }
      }
    }
  }
?>