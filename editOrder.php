<?php


$connect = new PDO("mysql:host=localhost;dbname=jbl2", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM employee ORDER BY empID ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["name(en)"].'">'.$row["name(en)"].'</option>';
 }
 return $output;
}

function fill_unit_select_box2($connect)
{ 
 $output2 = '';
 $query2 = "SELECT * FROM desination ORDER BY id ASC";
 $statement2 = $connect->prepare($query2);
 $statement2->execute();
 $result = $statement2->fetchAll();
 foreach($result as $row2)
 {
  $output2 .= '<option value="'.$row2["title"].'">'.$row2["title"].'</option>';
 }
 return $output2;
}

function fill_unit_select_box3($connect)
{ 
    $output3 = '';
    $query3 = "SELECT * FROM shift";
    $statement3 = $connect->prepare($query3);
    $statement3->execute();
    $result = $statement3->fetchAll();
    foreach($result as $row3)
    {
     $output3 .= '<option value="'.$row3["title"].'">'.$row3["title"].'</option>';
    }
    return $output3;
   }
?>




<!DOCTYPE html>
<html lang="en">
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
       <th>Employee Name</th>
       <th>Designation</th>
       <th>Shift</th>
       <th>Date</th>
       <th>Time From</th>
       <th>Time To</th>   
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
            changeMonth: true ,
            changeYear: true
        });
    });
</script>


<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){

    
  var html = '';
  html += '<tr>';
  
  html += '<td><select name="name[]" class="form-control selectpicker"><option value=""></option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><select name="designation[]" class="form-control selectpicker"><option value=""></option><?php echo fill_unit_select_box2($connect); ?></select></td>';
  html += '<td><select name="shift[]" class="form-control "><option value=""></option><?php echo fill_unit_select_box3($connect); ?></select></td>';
  html += '<td><input type="text" name="Datepicker[]" id="datepicker" class="form-control" /></td>';
  html += '<td> <input type="time" name="time[]" id="mytime"></td>';
  html += ' <td><input type="time" name="timeTo[]" id="timeTo"></div>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

  $('#item_table').append(html);
 });

 
 $(document).on('click', '.remove', function(){  
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = ''; 
  $('.shift').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Shift at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  
  $('.Datepicker').each(function(){
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
    url:"insertEdit.php",
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


