<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include('heading.php');
  include('./menu.php');
 ?>
 <title>Links</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <?php  include('./check.php'); ?>
   <h1 class="page-header">Links</h1>
    <ol style="list-style: none;">
     <li><a style="text-decoration: none;" href="https://myremote.io">MyRemote.io</a></li>
     <li><a style="text-decoration: none;" href="https://myremote.io/panel">The myRemote API</a></li>
     <li><a style="text-decoration: none;" href="https://github.com/Evert-Arends/myRemote-client">MyRemote on Github</a></li>
     <li><a style="text-decoration: none;" href="../changelog.log">Changelog</a></li>
     <li><a style="text-decoration: none;" href="../readme.important">Readme</a></li>
     <li><a style="text-decoration: none;" href="./sitemap.php">Sitemap</a></li>
    </ol>
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