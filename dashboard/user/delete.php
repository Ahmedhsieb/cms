<?php

require "../../lib/user.php";
//require "../../lib/validation.php";
//require "../../lib/category.php";
// require "../../lib/helper.php";

$user = new user;
$user->deleteUser($_GET['id']);
helper::redirect("user",0);