<?php


include("./connectMySQL.php");
include("./Models/Result.php");

    $username=$_POST['username'];
    $password=$_POST['password'];



    try{
        $execute=mysqli_query($conn,"call login('{$username}','{$password}')") or die("There was an error");
        $execute=$execute->fetch_assoc();
       
        if($execute!=null){
            $result= new Result(200,"Sucessfull",$execute);
        }else{
            $result= new Result(200,"The email or password is incorrect",$execute);
        }

        
    }catch(Exception $err){
        $result = new Result(400,"Error",$err->getMessage());
    }

    echo json_encode($result);
?>