<?php
session_start();
require "setting.php";
//require "db.php";
class auth extends db
{

    public function validation($user_name, $password){
        $res =  $this->select("user", "*")
            ->where("name", "=", $user_name)
            ->orWhere("email", "=", $user_name)
            ->andWhere("password", "=", $password)
            ->getRow();
        if (!empty($res)) {
            if ($res['is_admin'] == 1) {
                $_SESSION['is_admin'] = 1;
            }
            else
                $_SESSION['is_admin'] = 0;
        }
        return $res;
    }

    public function is_login(){
        return (!empty($_SESSION['user'])) ? 1 : 0;
    }

    public function is_admin(){
//        echo $this->admin;die;
        return $_SESSION['is_admin'];
    }

}