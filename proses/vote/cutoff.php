<?php
  session_start();
  $_SESSION['val'] = '<div id="auto-close" class="alert alert-warn bg-warning"><em class="fas fa-info-circle"></em> Pemilihan Sudah Di Tutup</div>';
  header('location: ../../user/');
?>