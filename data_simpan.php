<?php
require "database.php";
 
$name        = $_POST['name'];
$description =$_POST['description'];
$price       =$_POST['price'];
$photo       =$_POST['photo'];


$sql= "INSERT INTO products VALUES('','$name', '$description','$price' ,'$photo', current_timestamp, current_timestamp)";


if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header('location: data_shop.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  header('location: data_shop.php');
?>