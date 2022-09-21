<?php
  if(empty($_GET['page']))
  {
    require 'page/vote.php';
  }elseif($_GET['page'] == "success")
  {
    require 'page/success.php';
  }
?>