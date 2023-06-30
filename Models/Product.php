<?php

class Product{
    public $name;
    public $price;
    public $idCategory;

    function __construct($name,$price,$idCategory){
        $this->name=$name;
        $this->price=$price;
        $this->idCategory=$idCategory;
    }
}

?>