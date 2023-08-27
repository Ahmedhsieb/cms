<?php
include "../main/header.php";
//session_start();
//require "../../lib/validation.php";
//require "../../lib/comment.php";
// require "../../lib/helper.php";
$res = 0;
$comment = new comment;
if ($comment->reviewSelect() > 0 ) {
    $comment_list = $comment->reviewSelect();
}else {
    $res = 1;
}

//$_SESSION['comment'] =  $comment_list;




?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Comment</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Content</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!$res):?>
                        <?php foreach($comment_list as $review):?>
                            <tr>
                                <td><?= $review['id'] ?></td>
                                <td><?= $review['comment'] ?></td>
                                <td><?= $review['name'] ?></td>
                                <td><?= $review['email'] ?></td>
                                <td><?= $review['content_title'] ?></td>
                                <td><a href="delete.php?id=<?=$review['id']?>">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>

            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>

<?php include "../main/footer.php"; ?>