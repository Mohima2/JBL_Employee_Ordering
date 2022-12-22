<?php


if(isset($_POST["emp_ID"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
 $serial = uniqid();
 for($count = 0; $count < count($_POST["emp_ID"]); $count++)
 {  
  $query = "INSERT INTO employee 
  (serial, emp_ID, name_bn, name_en, designation, cell_ID, usertype, pwd) 
  VALUES (:serial, :emp_ID, :name_bn, :name_en, :designation, :cell_ID, :usertype, :pwd)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':serial'   => $serial,
    ':emp_ID	'  => $_POST["emp_ID"][$count], 
    ':name_bn' => $_POST["name_bn"][$count], 
    ':name_en'  => $_POST["name_en"][$count],
    ':designation' => $_POST["designation"][$count],
    ':cell_ID' => $_POST["cell_ID"][$count],
    ':usertype' => $_POST["usertype"][$count],
    ':pwd' => $_POST["pwd"][$count]
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