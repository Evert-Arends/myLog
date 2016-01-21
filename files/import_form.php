<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include('heading.php');
  include('./menu.php');
 ?>
 <title>import log files</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <?php  include('./check.php'); ?>
   <h1 class="page-header">Import log files</h1>
   <div class="col-md-12 col-xs-12">
    <div class="panel panel-default NewLog">
     <div class="panel-heading">
      <h3 class="panel-title">Import text.</h3>
     </div>
     <div class="panel-body">
      <form action="../files/import.php" method="POST" id="add_log">
       <div class="form-group">
        <textarea autocomplete="off" class="form-control" maxlength="8000" name="field1" id="field1" rows="10" cols="600" placeholder="Log"></textarea>
        <input class="btn btn-primary" style="margin-top: 10px;" type="submit" id="upload" onkeypress="SubmitForm();" onclick="SubmitForm();" value="Upload"/>
        <br>
       </div>
      </form>
     </div>
     <div class="panel-footer">
      <p>Make sure it looks like this, and make sure you dont have double id's.<br>
        <div style="background-color: #eee; border-radius: 5px;">
         1;2016-01-13;10:57:47;test1||<br>
         2;2016-01-13;10:53:51;test2||<br>
         3;2016-01-13;10:51:52;test3||<br>
        </div>
        Otherwise it can not be imported to the database.
      </p>
     </div>
    </div>
   </div>
   <!--table that contains the imported file-->
    <?php 
     $lines = file("../Export/dataoutput.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
     $data = array_map(function($v){
      list($id,$date,$time,$log) = explode(";",$v);
      return ["id"=>$id,"date"=>$date,"time"=>$time,"log"=>$log];
     },$lines);
    ?>
    <h3 class="page-header">Items you want to import.</h3>
    <table class="table table-responsive table-hover">
     <tr>
      <td>id</td>
      <td>date</td>
      <td>time</td>
      <td>log</td>
     </tr>
     <?php foreach($data as $table){ ?>
     <tr>
      <td><?php echo $table["id"];?></td>
      <td><?php echo $table["date"];?></td>
      <td><?php echo $table["time"];?></td>
      <td><?php echo $table["log"];?></td>
     </tr>
     <?php } ?>
    </table>
    <form action="" method="POST">
     <input class="btn btn-primary" style="margin-top: 10px;" type="submit" name="UploadAll" id="UploadAll" value="Import to database."/>
    </form>
    <br>
    <br>
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

<?php
 if(isset($_POST['UploadAll'])) {
  include('../db_con/con.php');
  $add = "LOAD DATA LOCAL INFILE '../Export/dataoutput.csv' INTO TABLE logs FIELDS TERMINATED BY ';' LINES TERMINATED BY '||' (id,date,time,log)";
  $link->query($add) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
  $f = @fopen("../Export/dataoutput.csv", "r+");
  if ($f !== false) {
   ftruncate($f, 0);
   fclose($f);
  }
  ?><script>location.replace('./import_form.php')</script><?php
 }
?>