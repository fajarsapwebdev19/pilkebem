<?php
    session_start();
    require_once '../../koneksi/koneksi.php';

    //jika tombol login di klik
    if(isset($_POST['login']))
    {
        // ambil username dan password dari input form login
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['password'])));

        // query data untuk menentukan username dan password ada di database admin
        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

        // cek data apakah ada di database atau tidak
        $cek = mysqli_num_rows($query);

        // jika username dan password sesuai dengan ada yang ada di database
        if($cek > 0)
        {
            // ambil data dari database
            $data = mysqli_fetch_assoc($query);

            // ambil data session untuk login
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['login'] = 'Oke';
            $_SESSION['status_akun'] = $data['status_akun'];
            $_SESSION['val'] = "<div id='auto-close' class='alert alert-success bg-success text-white'><em class='fas fa-check-circle'></em> Selamat Datang $data[nama] Di Aplikasi E-PILKEBEM Anda Login Sebagai $data[level]</div>";
            header('location: ../');
        }
        // jika username tidak sesuai di database maka akan menampilkan sebuah pesan error
        else
        {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white text-alert"><em class="fas fa-times-circle"></em> Username Atau Password Salah !</div>';
            header('location: ./');
        }
        
    }
?>