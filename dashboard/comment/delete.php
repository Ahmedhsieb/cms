<?php

require "../../lib/comment.php";
//require "../../lib/helper.php";

$comment = (new comment)->deleteComment($_GET['id']);
helper::redirect("comment",0);
