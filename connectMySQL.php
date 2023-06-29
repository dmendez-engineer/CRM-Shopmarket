<?php
$servername="localhost";
$username="root";
$password="sasa";
$database="java_curso";

$conn= mysqli_connect($servername,$username,$password,$database);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
else{
  //  echo "Connection successfully:";
}
?>