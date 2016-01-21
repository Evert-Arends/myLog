<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include('heading.php');
  include('./menu.php');
 ?>
 <title>Sitemap</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <?php include('./check.php'); ?>
   <h1 class="page-header">Sitemap</h1>
    <div class="col-md-6">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Personal Log Sitemap.</h3>
      </div>
      <div class="panel-body">
       <?php 
        $fh = fopen("../files2.map", 'r');
        $pageText = fread($fh, 25000);
        echo nl2br($pageText);
       ?>
      </div>
     </div>
    </div>
    <div class="col-md-6">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">CKeditor Sitemap.</h3>
      </div>
      <div class="panel-body">
       <?php 
        $fh = fopen("../files.map", 'r');
        $pageText = fread($fh, 25000);
        echo nl2br($pageText);
       ?>
      </div>
     </div>
    </div>
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