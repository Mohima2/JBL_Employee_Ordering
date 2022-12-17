<?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=jbl", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM employee ORDER BY code ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["code"].'">'.$row["code"].'</option>';
 }
 return $output;
}

function fill_unit_select_box2($connect)
{ 
 $output2 = '';
 $query2 = "SELECT * FROM duty_shift ORDER BY id ASC";
 $statement2 = $connect->prepare($query2);
 $statement2->execute();
 $result2 = $statement2->fetchAll();
 foreach($result2 as $row2)
 {
  $output2 .= '<option value="'.$row2["id"].'">'.$row2["id"].'</option>';
 }
 return $output2;
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Office Duty</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="jquery-ui.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="timepicker.css">
  <script type="text/javascript" src="timepicker.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>

 <?php include ("nav.php"); ?>
  <br />
  <div class="container">
   
   <h4 align="center">Office Duty</h4>
   <br />
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       
       <th>Employee ID</th>
       <th>Shift ID</th>
       <th>Date</th>
       <th>Time From</th>
       <th>Time To</th>
      
      </tr>
      <tr>
      <td><select name="empID[]" class="form-control item_unit"><option value="">Select ID</option></select></td>
        <td><select name="shiftID[]" class="form-control item_unit"><option value="">Select Shift</option></select></td>
        <td><input type="text" name="Datepicker[]" id="datepicker" class="form-control item_name" /></td>
      
        <td><input id="timepkr" style="width: 100px; float: left" class="form-control" placeholder="HH:MM" /><button class="btn btn-primary"  onclick="showpickers('timepkr',12)" ><i class="fa fa-clock-o"></i></button></td>
        <div class="timepicker"></div>
        <td><input type="text" name="TimeTo[]" class="form-control item_name" /></td>
      </tr>
     </table>
     <div><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></div>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div>
    </div>
   </form>
  </div>
 </body>
</html>

<script src="jquery-3.6.2.min.js"></script>
<script src="jquery-ui.min.js"></script>

<script>
    $(document).ready(function(){
        $('#datepicker').datepicker({
            dateFormat: "dd-mm-yy", 
            changeMonth: true
        });
    });
</script>


<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  
  html += '<td><select name="empID[]" class="form-control item_unit"><option value="">Select ID</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><select name="shiftID[]" class="form-control item_unit"><option value="">Select Shift</option><?php echo fill_unit_select_box2($connect); ?></select></td>';
  html += '<td><input type="text" name="Datepicker[]" id="datepicker" class="form-control item_name" /></td>';
  html += '<td><input type="text" name="Time[]" class="form-control item_name" /></td>';
  html += '<td><input type="text" name="TimeTo[]" class="form-control item_name" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){  
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.empID').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Employee ID at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.shiftID').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Shift ID at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  
  $('.Date').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success"> Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>



