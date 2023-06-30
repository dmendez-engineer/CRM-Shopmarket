<?php
include("./connectMySQL.php");
include("./Models/Result.php");
include("./Models/Category.php");

if(isset($_POST['getCategory'])){
    //getCategory
    $arrayCategory=array();
    try{
        $execute=mysqli_query($conn,"call getCategory()");
        $result=$execute->fetch_all(MYSQLI_ASSOC);
        

        foreach($result as $row){
            $category= new Category($row['id'],$row['nombre']);
            array_push($arrayCategory,$category);
        }
        $result= new Result(200,"The customer was inserted succesfully",$arrayCategory);

        echo json_encode($result);

    }catch(Exception $err){
        $result= new Result(200,"The customer was inserted succesfully",$err->getMessage());
		echo json_encode($result);
    }

}
if(isset($_POST['postProduct'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $idCategory=$_POST['idCategory'];

    try{
        $execute=mysqli_query($conn,"call insertProduct('{$name}','{$price}','{$idCategory}')");
        $result=$execute->fetch_column();
        if($result==0){
            $result= new Result(404,"This product already exists!","ERROR");
        }else{
            $result= new Result(200,"The product was added succesfully",$result);
        }
        echo json_encode($result);
        
    }catch(Exception $ex){
        $result= new Result(200,"The customer was inserted succesfully",$err->getMessage());
		echo json_encode($result);
    }
}

?>