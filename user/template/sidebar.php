<?php 
  if(empty($_GET['page']))
  {
    require 'sidebar/vote.php';
  }
  elseif($_GET['page'] == "success")
  {
    require 'sidebar/vote.php';
  }
?>