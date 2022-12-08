<?php

$host = "localhost";
$user = "root" ;
$password = "";
$db="mohima";

$data = mysqli_connect($host,$user,$password,$db);

if($data === false){
    die("Connection Error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

   $sql = "SELECT * FROM reg where username='".$username."' AND password='".$password."' " ;
    
    $result = mysqli_query($data , $sql);

    $row = mysqli_fetch_array($result);

    if($row["usertype"]=="user"){
       $_SESSION["username"]=$username; 
       header("location:home.php");
    }

    elseif($row["usertype"]=="admin"){
        $_SESSION["username"]=$username; 
        header("location:adminhome.php");
    }

    else{
        
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Registration</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
             
                <div class="card-front">
                    <h2>LOGIN</h2>
                    <form action="login.php" method="POST">
                        <input type="text" class="input-box" placeholder="User ID" name="username" required>
                        <input type="password" class="input-box" placeholder="Password" name="password" required>
                        <button type="submit" class="submit-btn" name="login">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>

                    </form>
                   <div class="div">

                   </div>
                    <a href="">Forget Password</a>
                </div>
            
               
            </div>
        </div>
    </div>
   
    
</body>
</html>
