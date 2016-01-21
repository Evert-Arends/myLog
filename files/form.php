<script src="../ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="./FontAwesome/css/font-awesome.css">
<link rel="stylesheet" href="./FontAwesome/css/font-awesome.min.css">

<div class="col-md-12 col-xs-12">
 <div class="panel panel-default NewLog">
  <div class="panel-heading">
   <h3 class="panel-title">New log item.</h3>
  </div>
  <div class="panel-body">
   <form action="" method="POST" id="add_log">
    <div class="form-group">
     <textarea autocomplete="off" class="form-control" maxlength="200" name="log" id="log" rows="10" cols="600" placeholder="Log"></textarea>
     <input class="btn btn-primary" style="margin-top: 10px;" type="button" id="searchForm" onkeypress="SubmitForm();" onclick="SubmitForm();" value="Enter log"/>
     <br>
    </div>
   </form>
  </div>
  <div class="panel-footer">
   <a style="cursor: pointer;" onclick="loadForm();"><i class="fa fa-refresh fa-2x"></i></a>
  </div>
 </div>
</div>

<script>
 CKEDITOR.replace('log');
       
 function loadForm() {
  loadData();
  loadData2();
 }
 
 function SubmitForm() {
  var log = CKEDITOR.instances.log.getData();
  if(log==null || log=="" || log=="<p>&Acirc;&#160;</p>"){
   document.getElementById("commandsuccess").innerHTML = 'No log inserted';
   var d = document.getElementById("commandsuccess");
   d.className = d.className + " alert alert-danger";
   d.style.display = 'block';
   setTimeout(function() {
    $('#commandsuccess').fadeOut('fast');
    d.setAttribute("id", "commandsuccess");
    d.className ="";
    d.style.display = 'none';
   }, 1000);
  }else{
   $.post("add_log.php", {log: log});
   document.getElementById("commandsuccess").innerHTML = "Succesfully added";
   var c = document.getElementById("commandsuccess");
   c.className = c.className + " alert alert-success";
   c.setAttribute("id", "commandsuccess_col");
   c.style.display = 'block';
   loadData();
   loadData2();
   setTimeout(function() {
    $('#commandsuccess_col').fadeOut('fast');
    c.setAttribute("id", "commandsuccess");
    c.className ="";
    c.style.display = 'none';
   }, 1000);
  }
  loadData();
  loadData2();
 }
</script>