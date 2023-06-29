<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//-------------------
include("conectar.php");
include("cliente.php");
$arr = array();
$consulta="SELECT * FROM CLIENTE";
$cliente= new Cliente('1','Daniel','mendez@mendez.com');
try{
    
$ejecutar = sqlsrv_query($con, $consulta);
	
}catch(Error $err){
	echo json_encode($err);
}


while($fila = sqlsrv_fetch_array($ejecutar)){
	$cliente= new Cliente($fila["Id"],$fila["Nombre"],$fila["Email"]);

    array_push($arr,$cliente);
   
}

echo json_encode($arr);

*/
?>