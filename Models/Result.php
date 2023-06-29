<?php
class Result{
    public $status;
    public $message;
    public $resultExecute;
    
    function __construct($sts,$msg,$res)
    {
        $this->status=$sts;
        $this->message=$msg;
        $this->resultExecute=$res;
    }
}
?>