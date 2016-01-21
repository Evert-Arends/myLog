//function that loads the table
 $(document).ready(function() {
  loadData();
 });
   
//function that refreshes table
 function loadData() {
  $.get("table.php", function (result) {
   $('#table').html(result);
  });
 }
 
//function that loads the form
  loadData2();

//function that refreshes form
 function loadData2() {
  $.get("form.php", function (result) {
   $('#form').html(result);
  });
 }