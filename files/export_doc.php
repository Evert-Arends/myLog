<?php
 if(isset($_POST['exportcsv'])){
  include('../db_con/con.php');
  $fh = fopen('../Export/data.csv', 'w');
  $sql = "SELECT * FROM logs ORDER BY date DESC, time DESC";
  $query = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
   $last = sizeof($row)-1;
   $i = 0;
   foreach($row as $field) {
    fwrite($fh, $field);
    if ($i != $last) {
     fwrite($fh, ";");
    } 
    elseif ($i == $last) {
     fwrite($fh, "||");
    }
    $i++;
   }                                 
   fwrite($fh, "\n");
  }
  fclose($fh);
  echo '<br>';
  echo '<div class="alert alert-success col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">Exported to data.csv.<br><br><a href="../Export/data.csv">View export.</a></div>';
 }

 if(isset($_POST['exporttxt'])){
  include('../db_con/con.php');
  $fh = fopen('../Export/data.txt', 'w');
  $sql = "SELECT * FROM logs ORDER BY date DESC, time DESC";
  $query = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
   $last = sizeof($row)-1;
   $i = 0;
   foreach($row as $field) {
    fwrite($fh, $field);
    if ($i != $last) {
     fwrite($fh, ";");
    } 
    elseif ($i == $last) {
     fwrite($fh, "||");
    }
    $i++;
   }                                 
   fwrite($fh, "\n");
  }
  fclose($fh);
  echo '<br>';
  echo '<div class="alert alert-success col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">Exported to data.txt.<br><br><a href="../Export/data.txt">View export.</a></div>';
 }
?>