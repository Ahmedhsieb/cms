<?php

require "../../lib/content.php";
// require "../../lib/helper.php";

$content = new content;
$content->deleteContent($_GET['id']);
helper::redirect("categoryDetalis",0);