<?php
require('val.php');

$host = $arr[0];
$uname = $arr[1];
$pw = $arr[2];
$db_name = $arr[3];

$link = @mysqli_connect($host, $uname, $pw, $db_name);
if (mysqli_connect_errno()) {
 echo '<span class="dberror">';
 printf("Fout: %s\n", mysqli_connect_error());
 exit();
 echo '</span>';
}
?>