<?php

if(isset($_POST["name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=jbl2", "root", "");
 $dutyID = uniqid();
 for($count = 0; $count < count($_POST["name"]); $count++)
 {  
  $query = "INSERT INTO officeoeder
  (dutyID, name, designation, shift, Datepicker, time, timeTo) 
  VALUES (:dutyID, :name, :designation :shift, :Datepicker, :time, timeTo)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':dutyID'   => $dutyID,
    ':name'  => $_POST["name"][$count], 
    ':designation'  => $_POST["designation"][$count],
    ':shift' => $_POST["shift"][$count], 
    ':Datepicker'  => $_POST["Datepicker"][$count],
    ':time'  => $_POST["time"][$count],
    ':timeTo'  => $_POST["timeTo"][$count]
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
