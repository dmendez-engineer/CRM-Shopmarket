<?php

function createUserName($name,$lastName){
    
    $newLastName=strtolower(explode(" ",$lastName)[0]);
    $username=strtolower($name[0]);
    
	$username=$username.$newLastName;

    for($i=0;$i<strlen($newLastName);$i++){
        if($newLastName[$i]=="á"){
            $newLastName=str_replace("á","a",$newLastName);
        }
        if($newLastName[$i]=="é"){
            $newLastName=str_replace("é","e",$newLastName);
        }
        if($newLastName[$i]=="í"){
            $newLastName=str_replace("í","i",$newLastName);
        }
        if($newLastName[$i]=="ó"){
            $newLastName=str_replace("ó","o",$newLastName);
        }
        if($newLastName[$i]=="ú"){
            $newLastName=str_replace("ú","u",$newLastName);
        }
    }
    
    return $username;
    
}

?>