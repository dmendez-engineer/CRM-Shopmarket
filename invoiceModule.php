<?php
include("./connectMySQL.php");
session_start();
$customerLogged=$_SESSION['customerLogged'];
$customerLogged=json_decode($customerLogged);


$execute=mysqli_query($conn,"call getProducts()");
$result=$execute->fetch_all(MYSQLI_ASSOC);
$optionHTML='';
foreach($result as $row){
    $optionHTML.="<option value={$row['precio']}>{$row['name_product']}</option>";

}

echo file_exists("changeesDivisesRequests.txt")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Module</title>
</head>
<body>
    <div class="header">
        <button class="btnMenu" id="btnMenu"><img src="./img/menu.JPG" width="30px" height="20px"/></button>
        <h1 class="title">Invoice Module </h1>
        <?php echo "<h1 class=username>".$customerLogged->username."</h1>" ?>
    </div>
   
    <div class="row">
        <div class="col-3">
            <div class="sideMenu" id="sideMenu">
                <div class="menuItems">
                <h2 class="item"><a  class="menuHref"href="admin.php">Admin Module </a></h2>       
                
                    <h2 class="item"><a  class="menuHref" href="optionMenu.php">Option Menu</a></h2>
                        <h2 class="item"><a class="menuHref">Send an email</a></h2>
                        <h2 class="item"><a class="menuHref">Contact</a></h2>
                        <h2 class="item"><a class="menuHref">Maintain</a></h2>
                        <h2 class="item"><a class="menuHref">Logout</a></h2>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex g-5 justify-content-between ">
            <div >
                <h2>Select the service</h2>
                <div class="mb-2">
                    <select id="cboProducts">
                        <option value="0">Select the product</option>
                        <?php echo $optionHTML; ?>
                    </select>
                    <button class="btn btn-primary" onclick="add()" id="add"> Add</button>
                </div>
                <div id="showAmount">
                    <label for="">Amount</label>
                    <input id="amount" disabled value="0"/>
                </div>

                <div>
                
                <table id="tableList" class="mt-5 table table-bordered">
                   
                </table>
                </div>




                <div class="mt-5">
                    <label>Convert the amount</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input"  type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Convert to dollars</label>
                        <p>Amount: $  <span id="amountInDollars"></span></p>
                    </div>
                </div>
            </div> 
            
            <div>
                <h2>Select the salesperson</h2>
            </div>       
        </div>
        
    </div>
    


    


    
   
</body>
</html>
<script type="text/javascript">
    var products=[];
    let amount=0;
    $("#showAmount").hide();
    $(document).ready(function(){
            $("#btnMenu").click(function(){
                $("#sideMenu").toggle(1000);
            });

           


            $("#flexSwitchCheckChecked").change(function(){
                
               
                $.ajax({
                    method:'get',
                    url:'changeDivise.php',
                    data:{amount:amount,change:1},
                    success:function(res){
             
                        var info=JSON.parse(res);
                       
                        document.getElementById('amountInDollars').innerHTML=info.result.amount;
                    },error:function(error){
                        console.log(error);
                    }
                })

            }); 
            
    });

    function add(){
                var product=$('#cboProducts').val();
               
                products.push({
                    price:$("#cboProducts").val(),
                    name:$("#cboProducts option:selected").text()
                });
                amount+=parseInt($("#cboProducts").val());
                document.getElementById('amount').value=amount; 
                //$("#amount").css('display','block');
                let table=document.getElementById('tableList');
                let tRow=document.createElement('tr');
                $(tRow).css('class','table-success');
                let tdText=document.createElement('td');
                let textNode=document.createTextNode($("#cboProducts option:selected").text());
                tdText.appendChild(textNode);
                
                tRow.appendChild(tdText);

                let tdPrice=document.createElement('td');
                let priceNode=document.createTextNode($("#cboProducts").val());
                tdPrice.appendChild(priceNode);
                
                tRow.appendChild(tdPrice);
           
                table.appendChild(tRow);

                $("#showAmount").show();
    }
    
</script>