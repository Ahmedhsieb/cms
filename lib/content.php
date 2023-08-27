<?php


// require "db.php";
require "category.php";
// require "helper.php";

class content extends db{

    public function getContentRow($id,$withJoin){
        if ($withJoin) {
            return $this
            ->select("content_select", "*") // content_select is a view in cms db have the join
//            ->join("category","category.id", "content.category_id")
//            ->join("user","user.id", "content.user_id")
            ->where("id", "=", $id)
            ->getRow();
        }else{
            return $this->select("content","*")->where("id", "=", $id)->getRow();
            }

        
    }
    public function getContentList($withJoin){
        if ($withJoin) {
        return $this
        ->select("content", "content.*, category.name AS category_name, user.name AS user_name")
        ->join("category","category.id", "content.category_id")
        ->join("user","user.id", "content.user_id")
        ->getAll();
        }else{
        return $this->select("content","*")->getAll();
        }
    }

    public function getContentByCategory($id){
        return $this->select("content","*")->where("category_id", "=", $id)->getAll();
    }
    public function addContent($data){
        return $this->insert("content", $data)->excu();
    }
    public function deleteContent($id){
        return $this->delete("content")->where("id", "=", $id)->excu();
    }
    public function updateContent($id, $data){
        return $this->update("content", $data)->where("id", "=", $id)->excu();
    }
}