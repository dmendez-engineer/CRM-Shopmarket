<?php
/*$url="https://restcountries.com/v3.1/alpha/col";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_exec($ch);

if(curl_errno($ch)){
    echo "There was an error: ".curl_error($ch);
    curl_close($ch);
}else{

}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
    <title>Document</title>
</head>
<body class="body w-75 mx-auto min-h-screen " style="background-color: gray;">
    <div class="header">
        <h1>Login Window</h1>
        
    </div>

    <div class="container mt-5">
        <div>
            
        </div>
        <div class="login">
            <div class="loginForm mx-auto">
                <div class="">
                <h1>Type your credentials</h1>
                    <div class="col mt-5">
                        <input type="text" id="username" placeholder="Username" class="credentials w-100"/>
                    </div>
                    <div class="col mt-5">
                        <input type="password" id="password"  class="credentials w-100" placeholder="Password"/>
                    </div>
                    <div class="col mt-5">
                        <input type="button" id="login" class="btn btn-primary w-100" value="Login"/>
                    </div>
                    <div class="col mt-5">
                        <a class="linkCreateAccount mt-5" href="register.php">Don't you have an account?</a>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
      
        $("#login").click(function(){
            let username=$("#username").val();
            let password=$("#password").val();

            
            $.ajax({
                method:"post",
                url:"loginBD.php",
                data:{username:username,password:password},
                success:function(res){
                    let info=JSON.parse(res);
                    console.log("LOGIN: ",info);

                    if(info.resultExecute!==null){
                        alert(`Welcome: ${info.resultExecute.username}`);
                        window.location.href="admin.php";
                    }else{
                        alert(info.message);
                    }
                },
                error:function(err){
                    console.log("ERROR LOGIN: ",err);
                }

            })

       });
    });

</script>