<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <div class="header">
        <button class="btnMenu" id="btnMenu"><img src="./img/menu.JPG" width="30px" height="20px"/></button>
        <h1 class="title">The Admin Module</h1>
        
    </div>
   
    <div class="row">
        <div class="col">
            <div class="sideMenu" id="sideMenu">
                <div class="menuItems">
                <h2 class="item"><a  class="menuHref"href="admin.php">Admin Module</a></h2>       
                <h2 class="item"><a  class="menuHref" href="optionMenu.html">Option Menu</a></h2>
                        <h2 class="item"><a class="menuHref">Send an email</a></h2>
                        <h2 class="item"><a class="menuHref">Contact</a></h2>
                        <h2 class="item"><a class="menuHref">Maintain</a></h2>
                        <h2 class="item"><a class="menuHref">Logout</a></h2>
                </div>
            </div>
        </div>
        <div class="col">

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