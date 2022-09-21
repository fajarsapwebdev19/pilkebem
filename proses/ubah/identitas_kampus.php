<?php
  session_start();
  require_once('../../koneksi/koneksi.php');

  if(isset($_POST['save']))
  {
    if(isset($_POST['id']))
    {
      // ambil data dari form
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['id'])));
      $kode_pt = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kode_pt'])));
      $nama_kampus = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_kampus'])));
      $nama_ketua = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ketua'])));
      $nip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nip'])));
      $alamat_kampus = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['alamat_kampus'])));
      $kelurahan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kelurahan'])));
      $kecamatan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kecamatan'])));
      $kabkota = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kab_kota'])));
      $akreditasi = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['akreditasi'])));
      $logo = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['logo']['name']));
      $tmp_name = $_FILES['logo']['tmp_name'];
      $size = $_FILES['logo']['size'];
      $extension = array('png','jpg','jpeg');
      $ex = pathinfo($logo, PATHINFO_EXTENSION);

      // jika foto kosong maka lanjut mengedit bagian datanya saja
      if(empty($_FILES['logo']['name']))
      {
        $save = mysqli_query($koneksi, "UPDATE identitas_kampus SET kode_pt='$kode_pt',nama_kampus='$nama_kampus',nama_ketua='$nama_ketua', nip='$nip',alamat_kampus='$alamat_kampus',kelurahan='$kelurahan', kecamatan='$kecamatan', kab_kota='$kabkota', akreditasi='$akreditasi' WHERE id='$id'");
      }else{
          // jika ukuran melebihi 2MB maka akan muncul pesan error
          if($size > 2000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white"><em class="fas fa-times-circle"></em> Gagal, Ukuran File Melebihi 2 MB</div>';
            header('location: ../../admin/');
          }
          else{
            // jika ekstensi tidak sesuai maka akan muncul pesan error
            if(!in_array($ex,$extension))
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white"><em class="fas fa-times-circle"></em> Gagal, Ekstensi Yang Didukung Adalah png,jpg,dan jpeg</div>';
              header('location: ../../admin/');
            }
            else{
            //hapus data lama
            $iden = mysqli_query($koneksi, "SELECT * FROM identitas_kampus");
            $data_iden = mysqli_fetch_assoc($iden);

            $logo_lama = $data_iden['logo'];

            unlink('../../assets/logo/'.$logo_lama);

            // memberi nama dan eksekusi upload ke dalam penyimpanan file
            $rename = rand().'_'.$logo;
            $dir = '../../assets/logo/'.$rename;

            move_uploaded_file($tmp_name, $dir);

            // eksekusi update data dan update logo
            $save = mysqli_query($koneksi, "UPDATE identitas_kampus SET kode_pt='$kode_pt',nama_kampus='$nama_kampus',nama_ketua='$nama_ketua', nip='$nip',alamat_kampus='$alamat_kampus',kelurahan='$kelurahan', kecamatan='$kecamatan', kab_kota='$kabkota', akreditasi='$akreditasi', logo='$rename' WHERE id='$id'");
          }
        }
      }
      // proses simpan data
      if($save)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><em class="fas fa-check-circle"></em> Berhasil Simpan Data !</div>';
        header('location: ../../admin/');
      }
    }
  }
?>