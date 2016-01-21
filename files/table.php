<div class="table-responsive">
 <table class="table table-responsive table-hover table-condensed">
  <thead>
   <tr>
    <th>ID</th>
    <th>Date</th>
    <th>Time</th>
    <th>Log</th>
    <th>Edit</th>
    <th>Delete</th>
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