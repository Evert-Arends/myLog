<?php
if(isset($_POST['host']) && isset($_POST['username']) && isset($_POST['button'])){
 if($_POST['button'] == 'install_db'){
  
 //database connection//
  $host = $_POST['host'];
  $uname = $_POST['username'];
  $pw = $_POST['password'];
  $db_name = "";
  $link = @mysqli_connect($host, $uname, $pw, $db_name);
    
  if (mysqli_connect_errno()) {
   echo '<span class="dberror">';
   printf("Fout: %s\n", mysqli_connect_error());
   exit();
   echo '</span>';
  }
  
 //create database//
  $sql = "CREATE DATABASE IF NOT EXISTS `logboek`";
  if(mysqli_query($link, $sql)){
   echo "Database logboek created successfully";
  } else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
  
 //database connection after database is created//
  $host2 = $_POST['host'];
  $uname2 = $_POST['username'];
  $pw2 = $_POST['password'];
  $db_name2 = "logboek";
  $link = @mysqli_connect($host2, $uname2, $pw2, $db_name2);
  if (mysqli_connect_errno()) {
   echo '<span class="dberror">';
   printf("Fout: %s\n", mysqli_connect_error());
   exit();
   echo '</span>';
  }
  
 //create datatable//
  $create = "CREATE TABLE IF NOT EXISTS `logs` (
   `id` int(5) NOT NULL AUTO_INCREMENT,
   `date` varchar(20) NOT NULL,
   `time` varchar(20) NOT NULL,
   `log` varchar(2000) NOT NULL,
   PRIMARY KEY (`id`)
   ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170";
  $link->query($create) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
 
 //insert test log//
  $date = date('Y-m-d');
  $time = date('H:i:s');
  $log = "<strong>Welcome to your personal log</strong><br><br>You can edit or delete this log.<br><br>Yours sincerely,<br><i>The myRemote team.</i>";
  $add = "INSERT INTO logs (date, time, log)
  VALUES ('".$date."','".$time."','".$log."')";
  $link->query($add) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
  
 //save database connection values in val.php//
  $filename="../db_con/val.php";
  $arr = array (
    0 => $_POST['host'],
    1 => $_POST['username'],
    2 => $_POST['password'],
    3 => "logboek"
  );
  file_put_contents($filename, '<?php $arr = ' . var_export($arr, true) . ';');
 }
}
?>