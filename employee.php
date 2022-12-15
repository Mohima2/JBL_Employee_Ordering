<?php 

$conn = mysqli_connect("localhost", "root", "", "jbl");

?>

<?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=jbl", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM cell ORDER BY cell_code ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["cell_code"].'">'.$row["cell_code"].'</option>';
 }
 return $output;
}

function fill_unit_select_box2($connect)
{ 
 $output2 = '';
 $query = "SELECT * FROM employee ORDER BY code ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output2 .= '<option value="'.$row["code"].'">'.$row["code"].'</option>';
 }
 return $output2;
}

?>

<html>
<head>
    <title>Employee</title>
</head>
<body>
<?php include ("header.php"); ?>
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
                                    <td><?= $post['id'] ?></td>
                                    <td><?= $post['name'] ?></td>
                                    <td><?= $post['designation'] ?></td>
                                    <td>
                                    <?= $post['code'] ?>
                                    </td>
                                    <td><?= $post['cell'] ?></td>
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


</br> </br>
<div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Add Employee" />
     </div>
                    </br>
<div class="container">
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Employee ID</th>
       <th>Name</th>
       <th>Designation Id</th>
       <th>Cell ID </th>
       <th>Password</th>
      </tr>
     </table>
     <div><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></div>
    </div>
   </form>
  </div>



  <script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="empID[]" class="form-control item_name" /></td>';
  html += '<td><input type="text" name="name[]" class="form-control item_name" /></td>';
  html += '<td><select name="code[]" class="form-control item_unit"><option value="">Select ID</option><?php echo fill_unit_select_box2($connect); ?></select></td>';
  html += '<td><select name="cell_code[]" class="form-control item_unit"><option value="">Select ID</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  
  html += '<td><input type="password" name="password[]" class="form-control item_name" /></td>';
  
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
    url:"insert.php",
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
