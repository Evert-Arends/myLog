<?php 
 $page=$_GET['page']; 
 if($page=='log'){
  include_once('../db_con/con.php');
  if($_GET['id'] != '') {
   $id=addslashes($_GET['id']);
   $delete = "DELETE FROM logs where id='$id'";
   $link->query($delete) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
   if($link) {
    header('location:index.php');
   }
  }
 }
?>
<script language="JavaScript">
 var allowedreferrer = "index.php"; 
 if (document.referrer.indexOf(allowedreferrer) == -1) {
  window.location="index.php";
 }
</script>