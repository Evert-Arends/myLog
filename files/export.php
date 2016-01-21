<!DOCTYPE html>
<html lang="en">
<head>
 <?php
  require('export_doc.php');
  include('heading.php');
  include('./menu.php');
 ?>
 <title>Export log files</title>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
   <div class="page col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-xs-12">
   <?php include('./check.php'); ?>
   <h1 class="page-header">Export</h1>
    <div class="col-md-12">
     <div class="panel panel-default">
      <div class="panel-heading"> 
       <h3 id="panel-title">Export logs</h3>
      </div>
       <div class="panel-body">
        <div class="table-responsive">
         <table class="table table-responsive table-hover table-condensed">
          <thead>
           <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Log</th>
           </tr>
          </thead> 
          <tbody>
           <?php
           include('../db_con/con.php');
           error_reporting(0);
           $query = "SELECT * FROM logs ORDER BY date desc, time desc";
           $gegevens = mysqli_query($link, $query) or trigger_error("Fout: " .mysqli_error($link), E_USER_ERROR);
           while($weergeven = mysqli_fetch_array($gegevens)){
            echo "<tr><td>",htmlentities($weergeven['id']), "</td>";
             echo "<td>",htmlentities($weergeven['date']), "</td>";
             echo "<td>",htmlentities($weergeven['time']), "</td>";
             $log = $weergeven['log'];
             echo "<td>",strip_tags($log,'<br> <strong> <u> <li> <i> \n /n <ol> <sup> <sub> <ins> <mark> <del> <small> <em> <ul> <a> <p>'), "</td>";
             echo "<td><a href='./formedit.php?id=".htmlentities($weergeven['id'])."&page=log'><i class='fa fa-pencil-square-o icon-larger'></i></a></b></td>";
             echo "&nbsp;&nbsp;";
             echo "<td><b><a href='./formdelete.php?id=".htmlentities($weergeven['id'])."&page=log'><i class='fa fa-trash icon-larger'></i></a></b></td>";
             echo "</tr>";
            }
           ?>
          </tbody> 
         </table>
        </div>
        <form action="" method="POST" role="form">
         <input style="margin-top: 10px;" class="btn btn-default" type="submit" id="exporttxt" name="exporttxt" value="export to txt"/>
         <input style="margin-top: 10px;" class="btn btn-default" type="submit" id="exporttxt" name="exportcsv" value="export to csv"/>
        </form>
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