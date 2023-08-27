<?php

require "db.php";
require "helper.php";
class category extends db
{

    public function getCategoryList(){
       return $this->select("category", "*")->getAll();
    }

    public function getCategoryById($id){
        return $this->select("category","*")->where("id", "=", $id)->getRow();
    }

    public function addCategory($data){
        return $this->insert("category", $data)->excu();
    }

    public function deleteCategory($id){
        return $this->delete("category")->where("id", "=", $id)->excu();
    }

    public function updateCategory($id,$data){
        return $this->update("category", $data)->where("id", "=", $id)->excu();
    }




}