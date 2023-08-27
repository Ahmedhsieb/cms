<?php
require "content.php";
//require "db.php";
class comment extends db{

    public function addComment($data){
        return $this->insert("review",$data)->excu();
    }

    public function getCommentById($id){
        return $this->select("review","*")->where("id", "=", $id)->getRow();
    }
    public function getCommentList($content_id){
        return $this->select("review","*")->where("content_id", "=", $content_id)->getAll();
    }

    public function deleteComment($id){
        return $this->delete("review")->where("id", "=", $id)->excu();
    }

    public function updateComment($id,$data){
        return $this->update("review",$data)->where("id", "=", $id)->excu();
    }

    public function __call($method, $arg){
        if($method == 'reviewSelect'){
            if (sizeof($arg) == 1) {
                return $this->select("review_select", "*")->where("id", "=", $arg[0])->getRow();
            }else {
                return $this->select("review_select", "*")->getAll();
            }
        }
    }
}