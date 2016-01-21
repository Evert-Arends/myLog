<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  include('heading.php');
  include('./menu.php');
 ?>
 <title>Personal log</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <?php include('./check.php'); ?>
   <h1 class="page-header">Personal log</h1>
   
   <div class="" id="commandsuccess"></div>
   
    <div id="form">
    <script type="text/javascript">
    if (document.readyState === "complete"){
      $.get("form.php", function (result) {
       $('#form').html(result);
     });
      function loadData2() {
       $.get("form.php", function (result) {
        $('#form').html(result);
       });
      }
    };
    </script>
    </div>
    <br>
    
     <div class="col-md-12 col-xs-12">
      <div class="panel panel-default DataTable">
       <div class="panel-heading">
        <span title="Turn auto refresh on/off.">
          <div class="onoffswitch" style="float: right;">
            <input style="float: right;" type="checkbox" name="pause" class="onoffswitch-checkbox" id="pause" value="Pause" alt="Auto reload on/off" checked>
            <label class="onoffswitch-label" for="pause"></label>
          </div>
        </span>
          <script type="text/javascript">
           $( document ).ready(function() {
            var p = 0;
            $('#pause').click(function(){
             if(p == 0){
              p = 1;
              document.getElementById('pause').value = 'Start';
             }else{
              p = 0;
              document.getElementById('pause').value = 'Pause';
             }
            });
            $.get("table.php", function (result) {
             $('#refreshtable').html(result);
            });
            setInterval(function() {
             $.get("table.php", function (result) {
              if(p == 0){
               $('#refreshtable').html(result);
              }else{
               
              }
             });
            }, 800);
           });
          </script>
        <h3 class="panel-title">All logs</h3>
       </div>
       <div class="panel-body" id="refreshtable" name="refreshtable">
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