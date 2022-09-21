<?php
    if(empty($_GET['page']))
    {
        require 'sidebar/home.php';
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }

    switch($page)
    {
        case 'account';
        require 'sidebar/account.php';
        break;

        case 'data_kelas';
        require 'sidebar/kelas.php';
        break;

        case 'data_mahasiswa';
        require 'sidebar/mahasiswa.php';
        break;

        case 'data_dtk';
        require 'sidebar/dtk.php';
        break;

        case 'data_kandidat';
        require 'sidebar/kandidat.php';
        break;

        case 'kehadiran';
        require 'sidebar/kehadiran.php';
        break;

        case 'pemilihan';
        require 'sidebar/pemilihan.php';
        break;

        case 'suara';
        require 'sidebar/suara.php';
        break;

        case 'profile';
        require 'sidebar/profile.php';
        break;

        case 'update_password';
        require 'sidebar/update_password.php';
        break;

        
    }
?>