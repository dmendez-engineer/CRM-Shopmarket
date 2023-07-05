<?php

if(isset($_GET['change'])){
    $amount=$_GET['amount'];
    $url="https://api.cambio.today/v1/quotes/CRC/USD/json?quantity={$amount}&key=42615|HK_Z~ccEeB4WXq6T77r93sbxhjB7mdrf";

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $converted=curl_exec($ch);
    curl_close($ch);

    $phpObject=json_decode($converted,true);
    $dateChange=$phpObject['result']['updated'];
    $value=$phpObject['result']['value'];
    $quantity=$phpObject['result']['quantity'];
    $amount=$phpObject['result']['amount'];

    if(file_exists("changesDivisesRequests.txt")){
        
    }

    $file=fopen('changesDivisesRequests.txt','w');
    fwrite($file,"Today: ".date("F j, Y, g:i a")."\n");
    fwrite($file,"Date request: ".$dateChange."\n");
    fwrite($file,"Change: ".$value."\n");
    fwrite($file,"Quantity for change: ".$quantity."\n");
    fwrite($file,"Amount Converted: ".$amount."\n");
    fwrite($file,"\n");
    fclose($file);

    echo $converted;
}


?>