<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
       
        <input type="date" name="d2" class="form-control">
       <button type="submit" class="btn btn-primary">Filter</button>

    </form>

    <div class="card">
        <div class="card-body">
            <?php 
            $conn = mysqli_connect("localhost", "root", "", "jbl");

            if(isset($_GET['d2'])){
                $d2 = $_GET['d2'];

                $query= "SELECT * FROM all_info WHERE created_at = '$d2' ";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $row){
                        echo $row['name'];

                    }
                }
                else{
                    echo "No Record";
                }
                        }
            ?>
        </div>
    </div>
</body>
</html>