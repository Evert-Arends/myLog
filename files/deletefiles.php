<?php
 if($_POST['button'] == 'delete'){
  unlink('../install/index.php');
  unlink('../install/install_db.php');
  rmdir('../install');
 }
?>