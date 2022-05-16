<?php
include_once "../Operation.php";
include_once "../DBClass.php";

class Comment extends Database implements Operation
{
    var $description;
    public function getdesc()
    {
        return $this->description;
    }
    public function setdesc($value)
    {
        $this->description = $value;
    }

    public function Add()
    {
       return parent::RunDML(" INSERT INTO comments
        VALUES (default, '" . $this->getdesc() . "' ,'" . $_GET["id"] . "')"); 
    }
    public function Update()
    {
    }
    public function Delete()
    {
    }
    public function GetAll()
    {
    }
}
