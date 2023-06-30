<?php
include("./connectMySQL.php");
session_start();

$customerLogged=$_SESSION['customerLogged'];
$customerLogged=json_decode($customerLogged);


$products=mysqli_query($conn,"call getProducts()");
$products=$products->fetch_all(MYSQLI_ASSOC);
$div="";

foreach($products as $row){
  
    $div.= "
    <div class='product position-relative mt-lg-5'>
        <div class='content position-absolute top-0 start-5'>
            <h1 class='name text-uppercase'>Name: <span class='fst-italic' style='color: greenyellow;'".">".$row['name_product']."</span> </h1>
            <p class='category mb-5 text-uppercase fw-bold'>Category: <span class='fst-italic' style='color: greenyellow;'".">".$row['name_category']."</span> </p>
            <p class='price text-uppercase fs-4 fw-bold'>Price: <span class='fst-italic' style='color: greenyellow';".">".$row['precio']."</span> </p>
        </div>
    </div> 
    ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <link rel="stylesheet" type="text/css" href="./css/product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="header" style="margin-bottom: 10px;">
        <button class="btnMenu" id="btnMenu"><img src="./img/menu.JPG" width="30px" height="20px"/></button>
        <h1 class="title">Product Module Module</h1>
        <?php echo "<h1 class=username>".$customerLogged->username."</h1>" ?>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="sideMenu" style="position: fixed;" id="sideMenu">
                <div class="menuItems">
                    <h2 class="item"><a class="menuHref" href="admin.php">Admin Module</a></h2>
                            
                        <h2 class="item"><a class="menuHref" href="optionMenu.php">Option Menu</a></h2>
                        <h2 class="item"><a class="menuHref" >Send an email</a></h2>
                        <h2 class="item"><a class="menuHref" >Contact</a></h2>
                        <h2 class="item"><a class="menuHref" >Maintain</a></h2>
                        <h2 class="item"><a class="menuHref" >Logout</a></h2>
                </div>
            </div>
        </div>
       
        <div class="col ">
            <div class="mb-5"><a class="imagenHref" href="productForm.php"><img src="./img/addProduct.JPG" width="100px" height="100px"/></a></div>
            <div class="row">
                <div class="col">
                    
                    <?php echo $div;?>
                </div>
            </div>        


        </div>
    </div>


</body>
</html>
