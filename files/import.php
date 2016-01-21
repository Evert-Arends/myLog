<?php
 if(isset($_POST['field1'])) {
  $data=$_POST['field1'];
  $ret = file_put_contents('../Export/dataoutput.csv',$data);
  if($ret === false) {
   die('There was an error writing this file');
  }
  else {
   ?><script>location.replace('./import_form.php');</script><?php
  }
 }
 else {
  die('No post data to process');
 }
?>