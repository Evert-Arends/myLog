<?php
 include('heading.php');
 
$filename = '../install/index.php';
if (file_exists($filename)) {
 echo '
 <div class="error_file" style="">
  <div class="alert-close"><i class="fa fa-times-circle-o fa-lg"></i></div>
  <br>
  <div class="col-md-12">
   <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
   <div class="panel panel-info securepanel1">
    <div class="panel-heading">
     <h3 class="panel-title">Delete install files</h3>
    </div>
    <div class="panel-body">
     <p>
      If you know for sure you already installed the database, you can delete the install files.
      If you didn`t do it yet, please click cancel.
     </p>
    </div>
    <div class="panel-footer">
     <input class="btn btn-primary" style="margin-top: 10px;" type="button" name="delete" id="delete" onclick="proceedDelete();" value="Proceed"/>
     <input class="btn btn-primary" style="margin-top: 10px;" type="button" name="cancel" id="cancel" onclick="history.go(-1);" value="Cancel"/>
    </div>
   </div>
  </div>
 </div>';
}else{
  echo '
 <div class="error_file" style="">
  <div class="alert-close"><i class="fa fa-times-circle-o fa-lg"></i></div>
  <br>
  <div class="col-md-12">
   <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
   <div class="panel panel-success securepanel2">
    <div class="panel-heading">
     <h3 class="panel-title">Install files deleted</h3>
    </div>
    <div class="panel-body">
     <p>
      All install files are deleted.
     </p>
    </div>
    <div class="panel-footer">
     <input class="btn btn-primary" style="margin-top: 10px;" type="button" name="cancel" id="cancel" onclick="goHome();" value="Cancel"/>
    </div>
   </div>
  </div>
 </div>';
}
?>

<script>
 $(document).ready(function(c) {
 	$('.alert-close').on('click', function(c){
 		var x = document.referrer;
 		location.replace(x);
 	});	
 });

 function proceedDelete() {
  var button = "delete";
  $.post("deletefiles.php", {button: button});
  location.replace('secure.php');
 }
 
 function goHome() {
  location.replace('./index.php');
 }
</script>