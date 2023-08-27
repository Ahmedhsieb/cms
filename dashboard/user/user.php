<?php
include "../main/header.php";
//session_start();
//require "../../lib/user.php";
//require "../../lib/validation.php";
//require "../../lib/content.php";
// require "../../lib/helper.php";
$res = 0;
$user = new user;
if ($user->getUserList() > 0 ) {
    $user_list = $user->getUserList();
//    print_r($user_list);die;
}else {
    $res = 1;
}

//$_SESSION['category'] =  $category_list;




?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="addUser.php">
                    <h3 class="card-title btn btn-primary" >Add New User</h3>
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Is Admin</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!$res):?>
                        <?php foreach($user_list as $u):?>
                            <tr>
                                <td><?= $u['id'] ?></td>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td><?= $u['password'] ?></td>
                                <td><?= $u['is_admin'] ?></td>
                                <td><a href="update.php?id=<?=$u['id']?>">Update</a></td>
                                <td><a href="delete.php?id=<?=$u['id']?>">Delete</a></td>
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