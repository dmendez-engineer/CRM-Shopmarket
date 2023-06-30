<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="header" style="margin-bottom: 10px;">
        <button class="btnMenu" id="btnMenu"><img src="../img/menu.JPG" width="30px" height="20px"/></button>
        <h1 class="title">Product Module</h1>
        
    </div>
    <div class="row">
        <div class="col-2">
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
        <div class="col ">
            <div class="login">
                <div class="loginForm ">
                    <div  >
                    <h1>Fill out the form to create a product</h1>
                      
                        <div class="col mt-5">
                            <input type="text" required id="name" name="name" placeholder="Product Name" class="credentials w-100"/>
                        </div>
                        <div class="col mt-5">
                            <input type="number" required id="price" name="price" placeholder="Price" class="credentials w-100"/>
                        </div>    
                        <div class="col mt-5">
                            <select class="form-select form-select-lg mb-3" id="category" name="category">
                               
                            </select>   
                        </div> 
                        
    
                        <div class="col mt-5">
                            <input type="button" id="btnRegister"   class="btn btn-primary w-100" value="Register"/>
                        </div>
    
                        <div class="col mt-5">
                            <a class="linkCreateAccount mt-5" href="customersList.php">Back to the Customer's list</a>
    
                        </div>
                        <input  value="insert" name="method" style="display: none;"/>
                    </div>
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
            var arrayCategories;
            $.ajax({
                method:"post",
                url:"productCrud.php",
                data:{getCategory:1},
                success:function(res){
                  
                    var info=JSON.parse(res);
                    
                    arrayCategories=info.resultExecute;


                    arrayCategories.forEach(c=>{
                        $("#category").prepend(`<option value=${c.id}>${c.name}</option>`);
                    });


                    $("#category").prepend(`<option value=0>Select the category</option>`);
                    $("#category option[value=0]").attr("selected",true);

                },error:function(err){
                    console.log("Error in the FrontEND getCategory: ",err);
                }
            });
    

    
            $("#btnRegister").click(function(){
                let name=$("#name").val();
                let price=$("#price").val();
                let category=$("#category").val();

                if(category===0){
                    alert("You must select the category");
                    return;
                }
                if([name,price,category].includes('')){
                    alert("All the fields are required");
                    return;
                }

                $.ajax({
                    method:"post",
                    url:'productCrud.php',
                    data:{name:name,price:price,idCategory:category,postProduct:1},
                    success:function(res){
                            var info=JSON.parse(res);
                                                  

                    },error:function(err){
                        console.log("Error FrontEend post product: ",err);
                    }
                })
            });


           
    });

</script>