<?php
session_start();

$customerLogged=$_SESSION['customerLogged'];
$customerLogged=json_decode($customerLogged);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Menu Option</title>
</head>
<body>
    <div class="header">
        <button class="btnMenu" id="btnMenu"><img src="./img/menu.JPG" width="30px" height="20px"/></button>
        <h1 class="title">The Admin Module </h1>
        <?php echo "<h1 class=username>".$customerLogged->username."</h1>" ?>
    </div>
   
    <div class="row">
        <div class="col-3">
            <div class="sideMenu" id="sideMenu">
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
        <div class="col">
            <div class=" text-center">
                <div class="row row-cols-4 mt-10">
                  <div class="col mt-5"><a class="imagenHref" href="./invoiceModule.php"><img src="./img/carrito-de-compras.png"/ width="100px" height="100px"></a></div>
                  <div class="col mt-5"><a class="imagenHref" href="./customersList.php"><img src="./img/cliente.png"/ width="100px" height="100px"></a></div>
                  <div class="col mt-5"><a class="imagenHref" href="./productList.php"><img src="./img/product.png"/ width="100px" height="100px"></a></div>
                  <div class="col mt-5"><a class="imagenHref"><img src="./img/services.png"/ width="100px" height="100px"></a></div>
                </div>
              </div>
        </div>
    </div>
    
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
            $("#btnMenu").click(function(){
                $("#sideMenu").toggle(1000);
            });
    });

</script>