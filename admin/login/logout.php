<?php
    session_start();
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><em class="fas fa-check-circle"></em> Berhasil Logout !</div>';
    unset($_SESSION['login']);
    unset($_SESSION['username']);
    header('location: ./');
?>