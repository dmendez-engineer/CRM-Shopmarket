<?php
class Cliente{
    public $Id;
    public $Nombre;
    public $Email;
    
    function __construct($id,$nom,$email){
        $this->Id=$id;
        $this->Nombre=$nom;
        $this->Email=$email;
    }
    
}
?>