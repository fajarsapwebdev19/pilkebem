<?php
  session_start();

  if(isset($_SESSION['val']))
  {
    echo $_SESSION['val'];
    unset($_SESSION['val']);
  }
?>