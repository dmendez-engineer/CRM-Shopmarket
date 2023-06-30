<?php



include("./Models/customer.php");
include("connectMySQL.php");
include("./Models/Result.php");

if(isset($_POST['getOneCustomer'])){
	$id=$_POST['id'];

	try{
		$execute=mysqli_query($conn,"call getOneCustomer('{$id}')");
		$customer=$execute->fetch_assoc();
		echo json_encode($customer);
		
	}catch(Exception $err){
		$result= new Result(200,"The customer was inserted succesfully",$err->getMessage());
		echo json_encode($result);
	}

}

if(isset($_POST['getCustomers'])){
	$proof="data";
	$listArray=array();
	$execute=mysqli_query($conn,"call getCustomers()");
	$result=$execute->fetch_all(MYSQLI_ASSOC);
	//echo("<script>console.log('EMAIL:: " ."{$email}" . "');</script>");
	
	foreach($result as $row){

		$customer= new Customer($row["Id"],$row["name"],$row['lastName'],$row['state'],$row['nid']);
		array_push($listArray,$customer);
		
	}


	echo json_encode($listArray);
}

if(isset($_POST['insert'])){

	
	$name=$_POST['name'];
	$lastName=$_POST['lastName'];
	$nid=$_POST['nid'];

	try{
		$execute=mysqli_query($conn,"call insertCustomer('{$name}','{$lastName}','{$nid}')");
		$execute=$execute->fetch_column();

		if($execute==0){
			$result= new Result(404,"This NID is already exist",$execute);
		}else{
			$result= new Result(200,"The customer was inserted succesfully",$execute);
		}

		
	}catch(Exception $err){
		$result= new Result(400,"There was an error inserting this customer",null);
	}


		echo json_encode($result);
}
if(isset($_POST['update'])){
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$lastName=$_POST['lastName'];
	$nid=$_POST['nid'];

	try{
		$execute=mysqli_query($conn,"call updateCustomer('{$id}','{$name}','{$lastName}','{$nid}')");
		echo json_encode("Updated");
	}catch(Exception $err){
		$result= new Result(400,"There was an error updating this customer",null);
	}
}
if(isset($_POST['remove'])){
	$id=$_POST['id'];

	try{
		$execute=mysqli_query($conn,"call removeCustomer('{$id}')");
		echo json_encode('remove');
	}catch(Exception $err){
		$result= new Result(400,"There was an error updating this customer",null);
	}
	echo json_encode('remove');
}





?>