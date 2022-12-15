<?php 

$conn = mysqli_connect("localhost", "root", "", "jbl");

?>
<html>
<head>
    <title>Cell</title>
</head>
<body>
<?php include ("header.php"); ?>
<div class="dashboard flex-grow-1">
        <div class="dash_headline d-flex bg-blue pb-5">
          
          
        </div>
        <div class="container-fluid px-4">
        <div class="row at-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>
                           Cell Information
                        </h1>
                    </div>

                <div class="card-body">
                <div class="table-responsive">
            <table class="table table-bordered table-striped">
                
                <thead>
                    <tr>
                        <th>Cell Code</th>
                        <th>Cell Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                         $check = "SELECT * FROM cell ";
                         $posts_run = mysqli_query($conn, $check);

                         if(mysqli_num_rows($posts_run) >0)
                         {
                            foreach($posts_run as $post)
                            {
                                ?>
                                <tr>
                                    <td><?= $post['cell_code'] ?></td>
                                    <td><?= $post['cell_title'] ?></td> 
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
        </div> </div></div>
 </div>
</div>
</div>
</div>
</div>
<script src="https://kit.fontawesome.com/605c1f1072.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
