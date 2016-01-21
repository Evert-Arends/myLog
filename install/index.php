<!DOCTYPE html>
<html lang="en">
<head>
 <meta name="description" content="">
 <meta name="author" content="">
 <meta name="msapplication-TileColor" content="#ffffff">
 <meta name="msapplication-TileImage" content="../images/fav.png">
 <meta name="theme-color" content="#ffffff">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="../ckeditor/ckeditor.js"></script>
 <link rel="apple-touch-icon" sizes="57x57" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="60x60" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="72x72" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="76x76" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="114x114" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="120x120" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="144x144" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="152x152" href="../images/fav.png">
 <link rel="apple-touch-icon" sizes="180x180" href="../images/fav.png">
 <link rel="icon" type="image/png" sizes="192x192" href="../images/fav.png">
 <link rel="icon" type="image/png" sizes="32x32" href="../images/fav.png">
 <link rel="icon" type="image/png" sizes="96x96" href="../images/fav.png">
 <link rel="icon" type="image/png" sizes="16x16" href="../images/fav.png">
 <link rel="manifest" href="../images/fav.png">
 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/custom_style.css" rel="stylesheet">
 <link href="./FontAwesome/css/font-awesome.css" rel="stylesheet">
 <link href="./FontAwesome/css/font-awesome.min.css" rel="stylesheet">
 <title>Install log</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <h1 class="page-header">Install</h1>
    <div class="col-md-12 col-xs-12">
     <div id="commandsuccess"></div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Your database values</h3>
      </div>
      <div class="panel-body">
       <form action="" method="POST" id="add_log">
        <div class="form-group">
         <input class="form-control" type="text" name="host" id="host" placeholder="Host" value="<?php echo $host; ?>"><br>
         <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>"><br>
         <input class="form-control" type="text" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>"><br>
         <input class="btn btn-primary" style="margin-top: 10px;" type="button" name="install_db" id="install_db" onclick="installDb();" value="Install database"/>
         <a class="btn btn-default" style="margin-top: 10px;" type="submit" name="link" id="link" href="../files/index.php">Go to index page</a>
         <br>
        </div>
       </form>
      </div>
     </div>
    </div>
    <script>
     function installDb() {
      var button = "install_db";
      var host = $("#host").val();
      var username = $("#username").val();
      var password = $("#password").val();
      if(host==null || host=="" || username==null || username==""){
       document.getElementById("commandsuccess").innerHTML = 'Fill in all username and password';
       var d = document.getElementById("commandsuccess");
       d.className = d.className + " alert alert-danger";
       d.style.display = 'block';
       setTimeout(function() {
        $('#commandsuccess').fadeOut('fast');
        d.setAttribute("id", "commandsuccess");
        d.className ="";
        d.style.display = 'none';
       }, 2000);
      }else{
       $.post("install_db.php", {host: host, username: username, password: password, button: button});
       document.getElementById("commandsuccess").innerHTML = "If host exists, database is installed";
       var c = document.getElementById("commandsuccess");
       c.className = c.className + " alert alert-success";
       c.setAttribute("id", "commandsuccess_col");
       c.style.display = 'block';
       setTimeout(function() {
        $('#commandsuccess_col').fadeOut('fast');
        c.setAttribute("id", "commandsuccess");
        c.className ="";
        c.style.display = 'none';
       }, 2000);
      }
     }
    </script>
   </div>
  </div>
 </div>
 <?php
  include('../files/footer.php');
 ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/index.js"></script>
</html>