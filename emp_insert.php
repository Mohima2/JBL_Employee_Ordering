<?php
//insert.php;

if(isset($_POST["empID"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
 $serial = uniqid();
 for($count = 0; $count < count($_POST["empID"]); $count++)
 {  
  $query = "INSERT INTO employee
  (serial, empID, name, designation, cell_ID, usertype, password) 
  VALUES (:serial, :empID, :name, :designation, :cell_ID, :usertype, :password)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':serial'   => $serial,
    ':empID'  => $_POST["empID"][$count], 
    ':name' => $_POST["name"][$count], 
    ':designation'  => $_POST["designation"][$count],
    ':cell_ID'  => $_POST["cell_ID"][$count],
    ':usertype'  => $_POST["usertype"][$count],
    ':password'  => $_POST["password"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>

