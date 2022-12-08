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
                            <p class="btn-btn-primary float-end">Current Month: <?= date('m'); ?></p>
                        </h1>
                    </div>


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
                    <?php 
                         $check = "SELECT * FROM reg WHERE usertype ='user' ORDER BY username ";
                         $posts_run = mysqli_query($conn, $check);

                         if(mysqli_num_rows($posts_run) >0)
                         {
                            foreach($posts_run as $post)
                            {
                                ?>
                                <tr>
                                    <td><?= $post['username'] ?></td>
                                    <td><?= $post['id'] ?></td>
                                    <td></td>

                                    <td><select name="cell" id="cell" required>
						                         	
                                      <option value="user">Inhouse Software Development Cell</option>
							                        <option value="admin">Security Cell</option>
							                        <option value="admin">Network Cell </option>
						                        </select>
                                    </td>
                                
				                          	<td><select name="Shift" id="Shift" required>
						                         	
                                      <option value="user">Day Shift</option>
							                        <option value="admin">Night Shift</option>
						                        </select>
                                    </td>
                                    <td>
                                      <input type="date" name="date" class="form-control">
                                     

                                    </td>
                                    <td><select name="time" id="time" required>
						                         	
                                       <option value="user">10AM-5PM</option>
                                       <option value="admin">5PM-9PM</option>
                                     </select>
                                      
                                      </td>
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