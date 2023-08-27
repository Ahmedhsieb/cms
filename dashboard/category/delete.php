<?php

require "../../lib/category.php";
// require "../../lib/helper.php";

$category = new category;
$category->deleteCategory($_GET['id']);
helper::redirect("category",0);