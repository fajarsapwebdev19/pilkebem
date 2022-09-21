<?php
    session_start();
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white text-alert"><em class="fas fa-times-circle"></em> Akun Anda Di Blokir Admin</div>';
    unset($_SESSION['login']);
    unset($_SESSION['username']);
    header('location: login/');
?>