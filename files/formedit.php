<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include('heading.php');
  include('./menu.php');
 ?>
 <title>Edit logs</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <?php  include('./check.php'); ?>
   <h1 class="page-header">Edit logs</h1>
    <?php
    include_once ("../db_con/con.php");
     if (isset($_POST["submit"])){
      $fouten  = array();
	
      //log field
      if (empty($_POST["log"])){
       $fouten[]="Log field is empty.";
      } else {
       $log = mysqli_real_escape_string($link, $_POST['log']);
      }
	
      $date = date('Y-m-d');
      $time = date('H:i:s');
	
      if ($fouten) {
       echo '<ul class="error">';
       echo '<strong>There have been an error.</strong>';
      foreach ($fouten as $fout) {
       echo '<li>'.$fout.'</li>';
      }
      echo '</ul>';

      }else{
       $blog_bewerken = "UPDATE logs SET log='".$log."', date='".$date."' , time='".$time."' WHERE id='".$_GET["id"]."'";
       $link->query($blog_bewerken) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
       ?><script>location.replace('./index.php');</script><?php 
      }
     }
    ?>

    <br>
    <?php
     $gebruiker_ophalen = "SELECT id, log FROM logs WHERE id='".$_GET["id"]."'";
	    $results = mysqli_query($link, $gebruiker_ophalen) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
     if (mysqli_num_rows($results) > 0) {
      while($row = mysqli_fetch_assoc($results)) {
       $log = $row["log"];
      }
    ?>
    <form action="" method="post">
     <textarea name="log" id="log" rows="20" cols="90">
      <?php 
       if (isset($log)) { 
        echo $log;
       }
      ?>
     </textarea>
     <br>
     <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Edit log">
    </form>
    <br>
    <br>
    <script>
     CKEDITOR.replace('log');
    </script>
    <?php 
     }
    ?>
   </div>
  </div>
 </div>
 <?php
  include('footer.php');
 ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/index.js"></script>
</html>