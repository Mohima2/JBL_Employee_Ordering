<?php 

$conn = mysqli_connect("localhost", "root", "", "mohima");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="dashboard.css" />

  </head>
  <body>
   

    <nav class="custom_nav topnav d-flex justify-content-between py-2 px-5">
      
      <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Filter.." name="search" />
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </nav>

    

      <div class="dashboard flex-grow-1">
        <div class="dash_headline d-flex bg-blue pb-5">
          
          
        </div>
        <div class="container-fluid px-4">
        <div class="row at-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>
                           Employee Ordering
                            <p class="btn-btn-primary float-end"> <?= date('F'); ?></p>
                        </h1>
                    </div>

                    <div id="txtHint"></div>
                <div class="card-body">
        
                <div class="table-responsive">
            
                <table class="table table-bordered table-striped">
                
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Designation</th>
                        <th>Cell</th>
                        <th>Shift</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>

                
                                <tr>

                               
                                
                                <td>
                                <?php

                           $result = mysqli_query($conn, "SELECT * FROM employee");
                            ?>
                           <select name="dynamic_data">
                           <?php
                             $i=0;
                             while($row = mysqli_fetch_array($result)) {
                             ?>
                                <option value="<?=$row["name"];?>"><?=$row["name"];?></option>

                           <?php
                             $i++;}
                                ?>
                          </select>
                               </td>
                                <td>
                                
                               
                               </td>
                                    <td></td>

                                    <td> <?php

$result = mysqli_query($conn, "SELECT * FROM cell");
 ?>
<select name="dynamic_data">
<?php
  $i=0;
  while($row = mysqli_fetch_array($result)) {
  ?>
     <option value="<?=$row["cell"];?>"><?=$row["cell"];?></option>

<?php
$i++;
}
?>


</select>
                                    </td>
                                
				                          	<td><?php

$result = mysqli_query($conn, "SELECT * FROM shift");
 ?>
<select name="dynamic_data">
<?php
  $i=0;
  while($row = mysqli_fetch_array($result)) {
  ?>
     <option value="<?=$row["shift"];?>"><?=$row["shift"];?></option>

<?php
$i++;
}
?>


</select>
                                    </td>
                                   
                                    <td>
                                      <input type="date" name="date" class="form-control">
                                     

                                    </td>
                                    <td> <?php

$result = mysqli_query($conn, "SELECT * FROM shift");
 ?>
<select name="dynamic_data">
<?php
  $i=0;
  while($row = mysqli_fetch_array($result)) {
  ?>
     <option value="<?=$row["time"];?>"><?=$row["time"];?></option>

<?php
$i++;
}
?>


</select>
                                      
                                      </td>
                                    <td>
                                        <a href="#" class="btn btn-success">Update</a>
                                    </td>
                                    
                                </tr>

                               
                   
                               

                    


                </tbody>
            </table></div>
        </div>
    </div>
    </div>
 </div>
</div>
</div>
      </div>
    </div>

    <script src="https://kit.fontawesome.com/605c1f1072.js" crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>