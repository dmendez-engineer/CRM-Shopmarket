<?php

include("./Models/Result.php");
include("./connectMySQL.php");
include("./helpers/Logic.php");
   
    

    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
   
    $username=createUserName($name,$lastName);
    //echo("<script>console.log('EMAIL:: " ."{$email}" . "');</script>");

    try{
        $execute=mysqli_query($conn,"call insertUser2('{$email}','{$username}','{$password}')") or die("There was a problem");
        $execute=$execute->fetch_column();
        $result= new Result(200,"The user was registered succesfully!",$execute);
    }catch(Exception $err){
        $result= new Result(400,"The was an error inserting this user",$err->getMessage());
   
       
    }
    
    


    

    echo json_encode($result);





  

?>