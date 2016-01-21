<?php 
 include('../db_con/con.php');
 include('./heading.php');
 if (isset($_POST["log"])){
  $date = date('Y-m-d');
  $time = date('H:i:s');
  $log = strip_tags($_POST['log'], '<br><strong><u><i>\n/n<ol><sup><sub><ins><mark><del><small><em><ul><a><p><li>');
  preg_replace('/â€‹/', '', $log);
  $add = "INSERT INTO logs (date, time, log)
  VALUES ('".$date."','".$time."','".$log."')";
  $link->query($add) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
 }
?>