<?php 

$conn = mysqli_connect("localhost", "root", "", "jbl");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Admin Page</title>
    
  </head>
  <body>
  <?php include ("nav.php"); ?>
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
                            <p class="btn-btn-primary float-end"><?= date('F'); ?></p>
                        </h1>
                    </div>

                <div class="card-body">
        
                <div class="table-responsive">
            
                <table class="table table-bordered table-striped">
                
                <thead>
                    <tr>
                        <th>Duty ID</th>
                        <th>Employee ID</th>
                        <th>Shift ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        
                        <th>Edit</th>

                    </tr>
                   
                </thead>
                <tbody>
                    <?php 
                         $check = "SELECT * FROM info  ";
                         $posts_run = mysqli_query($conn, $check);

                         if(mysqli_num_rows($posts_run) >0)
                         {
                            foreach($posts_run as $post)
                            {
                                ?>
                                <tr>
                                    <td><?= $post['dutyID'] ?></td>
                                    <td><?= $post['empID'] ?></td>
                                    <td><?= $post['shiftID'] ?></td>
                                    <td>
                                    <?= $post['Date'] ?>
                                    </td>
                                    <td><?= $post['Time'] ?></td>
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
      
    ></script>
  </body>
</html>