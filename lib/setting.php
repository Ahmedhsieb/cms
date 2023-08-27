<?php

require "comment.php";

class setting extends db
{
    public function getSettingList(){
        return $this->select("setting","*")->getAll();
    }

    public function getSettingByKey($key){
        return $this->select("setting","*")->where("id", "=", $key)->getRow();
    }

    public function deleteSetting($id){
        return $this->delete("setting")->where("id", "=", $id)->excu();
    }

    public function addSetting($setting_value){
        return $this->insert("setting", $setting_value)->excu();
    }

}