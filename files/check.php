<?php
include('heading.php');

$filename = '../install/index.php';
if (file_exists($filename)) {
 echo '
 <div class="error_file" style="">
  <div class="alert-close"><i class="fa fa-times-circle-o fa-lg"></i></div>
  <br>
  <div class="col-md-12">
   <div class="panel panel-danger InstallFolder">
    <div class="panel-heading">
     <h3 class="panel-title">Is your database installed?</h3>
    </div>
    <div class="panel-body">
     <p>
      When you finished installing our application you have to delete
      your install folder. When the database is not installed yet you can not 
      use the application. If you already installed the database, delete 
      the folder.
     </p>
    </div>
    <div class="panel-footer">
     <ul class="nav nav-pills">
     <li role="presentation"><a style="text-decoration: none;" href="../install/index.php">Install database</a></li>
      <li role="presentation"><a style="text-decoration: none;" href="./secure.php">Delete install folder</a></li>
     </ul>
    </div>
   </div>
  </div>
 </div>';
}
?>

<script>
$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$(this).parent().fadeOut('slow', function(c){
		});
	});	
});
</script>