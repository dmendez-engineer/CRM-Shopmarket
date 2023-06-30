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
        <h1 class="title">Customer Module</h1>
        
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
            <div class="mb-5"><a class="imagenHref" href="customer.html"><img src="./img/addUser.png" width="60px" height="60px"/></a></div>
            <table class="table" id="information">
                <thead>
                    <tr>
                        <th>ID</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>State</th>
                    <th>NID</th>
                    <th>Action (Edit)</th>
                    <th>Action (Remove)</th>
                </tr>
                </thead>
                <tbody id="tbody"> 
                    <tr class="data">
                      
                        
                    </tr>
                
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>

<script type="text/javascript">

class Customer{
    
    constructor(id,name,lastName,nid){
        this.id=id;
        this.name=name;
        this.lastName=lastName;
        this.nid=nid
    }
}

    $(document).ready(function(){
            $("#btnMenu").click(function(){
                $("#sideMenu").toggle(1000);
            });
            

            $.ajax({
                method:'post',
                url:"crudCustomer.php",
                data:{getCustomers:1},
                success:function(res){
                    let customerList=JSON.parse(res);
                    drawTable(customerList);
        
                },error:function(err){
                    console.log("Error in the frontend: ",err);
                }
            })
    });








function drawTable(info){
    var tablep =document.getElementById('information');
                    var tbody=document.getElementById('tbody');
                    
                    for(let i=0;i<info.length;i++){

                        let customer= new Customer(info[i]["Id"],info[i]["Name"],info[i]["LastName"],info[i]["Nid"]);
                        console.log(customer);
                       
                        var tableRow=document.createElement("tr");
                       
                        var tableDataId=document.createElement("td");
                        var textId=document.createTextNode(info[i]["Id"]);
                        tableDataId.appendChild(textId);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);

                        tableDataId=document.createElement("td");
                        textId=document.createTextNode(info[i]["Name"]);
                        tableDataId.appendChild(textId);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);

                        tableDataId=document.createElement("td");
                        textId=document.createTextNode(info[i]["LastName"]);
                        tableDataId.appendChild(textId);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);

                         tableDataId=document.createElement("td");
                         textId=document.createTextNode(info[i]["State"]=="1"?"Active":"Inactive");
                         console.log(textId);
                        tableDataId.appendChild(textId);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);

                         tableDataId=document.createElement("td");
                         textId=document.createTextNode(info[i]["Nid"]);
                        tableDataId.appendChild(textId);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);


                        tableDataId=document.createElement("td");
                        let buttonEdit=document.createElement("button");
                        $(buttonEdit).attr("id","btnEdit"+i);
                        $(buttonEdit).click(function(){
                            Edit(i+1);
                        })
                        let imgEdit=document.createElement("img");
                        imgEdit.setAttribute("id","edit"+i);
                        $(imgEdit).attr("src","./img/edit.JPG").attr("width","50px").attr("heigth","50px");
                        buttonEdit.appendChild(imgEdit);
                        tableDataId.appendChild(buttonEdit);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);


                        tableDataId=document.createElement("td");
                        let button=document.createElement("button");
                        $(button).attr("id","btnRemove"+i);

                        $(button).click(function(){
                            Remove(i+1);
                        })
                        

                        let img=document.createElement("img");
                        img.setAttribute("id","remove"+i);
                        $(img).attr("src","./img/remover.png").attr("width","50px").attr("heigth","50px");

                         button.appendChild(img);
                         
                        tableDataId.appendChild(button);
                        
                        tableRow.appendChild(tableDataId);
                        tbody.appendChild(tableRow);
                        tablep.appendChild(tbody);

                    }
                    


}

function Edit(id){


window.location.href="customer.html?id="+id;
}
function Remove(id){
    if(confirm("Are you sure that you want to remove this customer: "+id)){
        $.ajax({
            method:"post",
            url:"crudCustomer.php",
            data:{id:id,remove:1},
            success:function(res){
               // console.log("Remove:",JSON.parse(res));
                window.location.reload();

            },error:function(err){
                console.log("Error in the frontend removing: ",err);
            }
        });
    }
}
</script>