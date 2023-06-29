<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Document</title>
</head>
<body class="body w-75 mx-auto min-h-screen">
    <div class="header"><h1>Register Window</h1></div>

    <div class="container mt-5">
        <div>
            
        </div>
        <div class="login">
            <div class="loginForm mx-auto">
                <div class="" >
                <h1>Fill out the form to get an account</h1>
                  
                <div class="col mt-5">
                        <input type="text" id="name" name="name" placeholder="Name" class="credentials w-100"/>
                    </div>
                    <div class="col mt-5">
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="credentials w-100"/>
                    </div>    
                    <div class="col mt-5">
                        <input type="email" id="email" name="email" placeholder="Email" class="credentials w-100"/>
                    </div>
                    <div class="col mt-5">
                        <input type="password" id="password" name="password" class="credentials w-100" placeholder="Password"/>
                    </div>
                    
                    <div class="col mt-5">
                        <input type="password" id="confirmPassword" name="confirmPassword"  class="credentials w-100" placeholder="Confirm Password"/>
                    </div>

                    <div class="col mt-5">
                        <input type="button" id="btnRegister"   class="btn btn-primary w-100" value="Register"/>
                    </div>

                    <div class="col mt-5">
                        <a class="linkCreateAccount mt-5" href="index.php">Login</a>

                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>

<script type="text/javascript">

    class User{
        constructor(email,password){
            this.email=email;
            this.password=password;
        }
    }
    $(document).ready(function(){

        $("#btnRegister").click(function(){
           let name= document.getElementById('name').value;
           let lastName= document.getElementById('lastName').value;
            let email= document.getElementById('email').value;
            let password= document.getElementById('password').value;
            let confirmPassword= document.getElementById('confirmPassword').value; 

            if(password.toLowerCase()!=confirmPassword.toLowerCase()){
                alert("The passwords are not matching");
                return;
            }
           
            $.ajax({
                method:'post',
                url:'registerBD.php',
                data:{name:name,lastName:lastName,email:email,password:password},
                success:function(res){
                
                    let info=JSON.parse(res);
                    
                   if(info.status==200){
                    if(info.resultExecute==0){
                        alert("This email already exist!");
                        return;
                    }else{
                        alert(info.message);
                    }
                    
                   }else{
                    alert(info.message);     
                    return;               
                   }
                    
                   
                },  
                error:function(err){
                    console.log("Error: ",err);
                    
                }
            });
            let user = new User(email,password);
            
        });



    }); 

    

</script>
</html>
