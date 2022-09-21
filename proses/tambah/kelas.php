<?php
    session_start();
    require_once('../../koneksi/koneksi.php');

    if(isset($_POST['tambah']))
    {
        $nama_kelas = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_kelas'])));

        if(empty($nama_kelas))
        {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-error"><em class="fas fa-times-circle"></em> Gagal ! Karena Inputan Kosong </div>';
            header('location: ../../admin/?page=data_kelas');
        }else{
            $query_kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE nama_kelas='$nama_kelas'");
            $cek_data = mysqli_num_rows($query_kelas);

            if($cek_data > 0)
            {
                $_SESSION['val'] = "<div id='auto-close' class='alert alert-warn'><em class='fas fa-info-circle'></em> Data $nama_kelas Sudah Ada Di Database</div>";
                header('location: ../../admin/?page=data_kelas');
            }else{
                $add = mysqli_query($koneksi, "INSERT INTO tb_kelas VALUES(NULL,'$nama_kelas')");

                if($add)
                {
                    $_SESSION['val'] = '<div id="auto-close" class="alert alert-success"><em class="fas fa-check-circle"></em> Tambah Data Berhasil</div>';
                    header('location: ../../admin/?page=data_kelas');
                }
            }
        }
    }
?>