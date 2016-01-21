<nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-left navbar-brand" href="./index.php">myRemote.io <small>Personal log</small></a>
  </div>
  <div id="navbar" class="navbar-right navbar-collapse collapse">
   <ul class="nav navbar-nav">
    <li <?php echo checkFile('index.php'); ?>><a href="./index.php">Home</a></li>
    <li <?php echo checkFile('import_form.php'); ?>><a href="./import_form.php">Importeren</a></li>
    <li <?php echo checkFile('export.php'); ?>><a href="./export.php">Exporteren</a></li>
    <li <?php echo checkFile('links.php'); ?>><a href="./links.php">Links</a></li>
   </ul>
  </div>
 </div>
</nav>

<?php
 function checkFile($file){
  if( strpos(debug_backtrace()[1]['file'], $file) !== false){
   return "class='active'";
  }
 }
?>