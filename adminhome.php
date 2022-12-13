<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "mohima");
if($conn === false){
  die("Connection Error");
}

if(isset($_POST['submit'])) {
$query = mysqli_query($conn,
"INSERT INTO office duty SET 
  emp_code ='". $_POST["emp_code"] . "' ,
  shift_id ='". $_POST["shift_id"] . "' ,
  date ='". $_POST["date"] .  "' ,
  shift_id	 ='". $_POST["shift_id"]. "' ,
  time_from ='". $_POST["time_from"] . "' ,
  time_to ='". $_POST["time_to"]."'	 ");

  $row = mysqli_fetch_array($query);
if(is_array($row)) {
$_SESSION["usertype"] = $row['usertype'];
$_SESSION["username"] = $row['username'];
}

?>

<?php
}
?>
<?php



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="homepage.css">

</head>
<body>

<header>
	
<nav>
	
	<div class="logo"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUFsbtuOubPinh6Zxxq7AOuR22chrXZ3TXrsYiidv9tQILJxW4IiO98D1XOAOwloAP1Nc&usqp=CAU" class="logo"style="vertical-align:middle"  >
    </div>
	<div class="menu">
		<a href="" style="font-size:20px">Home</a>	
		
		<a href="">Employee Management</a>		
		<a href="cell.php">Cell</a>
        <a href="shift.php">Shift</a>
		<a href="logout.php">Log out</a>
	</div>
</nav>


	<main>
		<section>
    
     
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
               <form action="new.php" method="POST">
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
              $i++;}
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
                   $i++;}
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
   <button type="submit" class="submit-btn" name="submit">Submit</button>
                </form>
 
		</section>
	</main>


</header>


   
  </body>
</html>

</body>
</html>