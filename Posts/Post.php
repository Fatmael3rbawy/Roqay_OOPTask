<?php
include_once "../Operation.php";
include_once "../DBClass.php";

class Post extends Database implements Operation 
{
    var $description;
    public function getdesc(){
        return $this->description;
    }
    public function setdesc($value){
          $this->description=$value;
    }

    public function Add(){ 
        return parent::RunDML("INSERT INTO posts
        VALUES (default, '".$this->getdesc()."')");
    }
    public function Update(){
        
    } 
    public function Delete(){
        
    }
    public function GetAll(){
        return parent::GetData("SELECT * from posts");
    }
    public function GetPostBYID(){
        return parent::GetData("select * from posts where id ='".$_GET["id"]."'");
    }
    public function GetPostWithComments(){
         return parent::GetData("select * from comments where post_id ='".$_GET["id"]."'");
    }
}
