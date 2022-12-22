<?php

$connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM designation";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["title"].'">'.$row["title"].'</option>';
 }
 return $output;
}

function fill_unit_select_box2($connect)
{ 
 $output = '';
 $query = "SELECT * FROM cell";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["cell_code"].'">'.$row["cell_code"].'</option>';
 }
 return $output;
}

?>


<?php 

$conn = mysqli_connect("localhost", "root", "", "jbl2");

?>



<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Employee</title>
</head>
<body>
<?php include ("nav.php"); ?>
<br />
  <div class="container">
   <h4 align="center">Add Employee in the List</h4>
   <br />
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Employee Code</th>
       <th>Name(Bangla)</th>
       <th>Name(English)</th>
       <th>Designation</th>
       <th>Cell Code</th>
       <th>User Role</th>
       <th>Password</th>      
      </tr>
     </table>
     <button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div>
    </div>
   </form>
  </div>

<div class="dashboard flex-grow-1">
        <div class="container-fluid px-4">
        <div class="row at-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>
                           Employee Details                          
                        </h1>
                    </div>
                <div class="card-body">     
                <div class="table-responsive">          
                <table class="table table-bordered table-striped">               
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Code</th>
                        <th>Cell</th>
                        <th>Edit Info</th>
                    </tr>                  
                </thead>
                <tbody>
                    <?php 
                         $check = "SELECT * FROM employee";
                         $posts_run = mysqli_query($conn, $check);
                         if(mysqli_num_rows($posts_run) >0)
                         {
                            foreach($posts_run as $post)
                            {
                    ?>
                    <tr>
                        <td><?= $post['serial'] ?></td>
                        <td><?= $post['name(bn)'] ?></td>
                        <td><?= $post['designation'] ?></td>
                        <td><?= $post['empID'] ?></td>
                        <td> <?= $post['cell_ID'] ?></td>
                        <td><a href="#" class="btn btn-success">Update</a></td>
                    </tr>
                    <?php
                            }
                         }
                         else
                         {
                    ?>
                    <tr>
                        <td colspan="6">No Record Found!</td>
                    </tr>
                    <?php 
                     }
                    ?>                   
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
     </div>
     </div>
</div>

<script src="https://kit.fontawesome.com/605c1f1072.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>


</body>
</html>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>

<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="emp_ID[]" class="form-control emp_ID" /></td>';
  html += '<td><input type="text" name="name_bn[]" class="form-control name_bn" /></td>';
  html += '<td><input type="text" name="name_en[]" class="form-control name_en" /></td>';
  html += '<td><select name="designation[]" class="form-control designation"><option value="">Select designation</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><select name="cell_ID[]" class="form-control cell_ID"><option value="">Select cell_ID</option><?php echo fill_unit_select_box2($connect); ?></select></td>';
  html += '<td><select name="usertype[]" class="form-control usertype"><option value="">Select usertype</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="pwd" name="pwd[]" class="form-control pwd" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.emp_ID').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Employee Code at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.name_bn').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Bangla Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.name_en').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  
  $('.designation').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Designation at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.cell_ID').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Set cell_ID at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.pwd').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter pwd at "+count+" Row</p>";
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
      $('#error').html('<div class="alert alert-success">Details Saved</div>');
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
