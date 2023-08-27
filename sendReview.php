<?php
require "lib/comment.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $blog_id = $_POST['blog_id'];

    $commentobj = new comment;
    $commentobj->addComment([
        "name"=>$name,
        "email"=>$email,
        "comment"=>$comment,
        "content_id" =>$blog_id
    ]);
