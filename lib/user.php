<?php
require "setting.php";
class user extends db
{
    public function getUserById($id){
        return $this->select("user", "*")->where("id", "=", $id)->getRow();
    }

    public function getUserList(){
        return $this->select("user", "*")->getAll();
    }

    public function addUser($data){
        return $this->insert("user", $data)->excu();
    }

    public function deleteUser($id){
        return $this->delete("user")->where("id", "=", $id)->excu();
    }

    public function updateUser($id, $data){
        return $this->update("user", $data)->where("id", "=", $id)->excu();
    }
}