<?php

session_start();
require "../../lib/setting.php";

$setting = new setting;

$_SESSION['applied'] = 1;
$_SESSION['setting'] =( $setting->getSettingByKey($_GET['id']))['setting_value'];

helper::redirect("../../index",0);