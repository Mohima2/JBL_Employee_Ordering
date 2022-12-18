<?php 

$conn = mysqli_connect("localhost", "root", "", "project");

?>
<?php

$connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM designation ORDER BY code ASC";
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
 $output2 = '';
 $query = "SELECT * FROM cell ORDER BY cell_code ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output2 .= '<option value="'.$row["cell_code"].'">'.$row["cell_code"].'</option>';
 }
 return $output2;
}
function fill_unit_select_box3($connect)
{ 
 $output3 = '';
 $query = "SELECT * FROM user";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output3 .= '<option value="'.$row["usertype"].'">'.$row["usertype"].'</option>';
 }
 return $output3;
}

?>

<html>
<head>
    <title>Employee</title>
</head>
<body>
<?php include ("nav.php"); ?>

<div class="container">
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Employee ID</th>
       <th>Name</th>
       <th>Designation</th>
       <th>Cell ID </th>
       <th>User Role</th>
       <th>Password</th>
      </tr>
     </table>
     <div><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></div>
    </div>
   </form>
  </div>
  <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Add Employee" />
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
                                    <td><?= $post['empID'] ?></td>
                                    <td><?= $post['name'] ?></td>
                                    <td><?= $post['designation'] ?></td>
                                    <td>
                                    <?= $post['cell-ID'] ?>
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-success">Update</a>
                                    </td>
                                    
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
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
 </div>
</div>
</div></div></div>



  <script>
$(document).ready(function(){
 
    $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="empID[]" class="form-control empID" /></td>';
  html += '<td><input type="text" name="name[]" class="form-control name" /></td>';
  html += '<td><select name="designation[]" class="form-control designation"><option value="">Select Designation</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><select name="cell[]" class="form-control cell"><option value="">Cell Code</option><?php echo fill_unit_select_box2($connect); ?></select></td>';
  html += '<td><select name="usertype[]" class="form-control usertype"><option value="">Select Usertype</option><?php echo fill_unit_select_box3($connect); ?></select></td>';
  html += '<td><input type="password" name="password[]" class="form-control" placeholder="0123456" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
  
 $(document).on('click', '.remove', function(){  
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';

  $('.cell_code').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Cell at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  

  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"emp_insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Info Updated</div>');
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



<script src="https://kit.fontawesome.com/605c1f1072.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>


</body>
</html>
