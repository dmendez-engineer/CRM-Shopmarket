<?php
class Customer{
    public $Id;
    public $Name;
    public $LastName;
    public $State;
    public $Nid;
    
    function __construct($id,$name,$lastName,$state,$nid){
        $this->Id=$id;
        $this->Name=$name;
        $this->LastName=$lastName;
        $this->State=$state;
        $this->Nid=$nid;
    }
    
}
?>