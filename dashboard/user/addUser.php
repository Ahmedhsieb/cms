<?php
include "../main/header.php";
//require "../../lib/user.php";
//require "../../lib/validation.php";
//require "../../lib/category.php";
// require "../../lib/helper.php";
$success = '';
$error = '';

if (isset($_POST['name'])) {
        $user = new user;
        $res = $user->addUser(
            ["name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "is_admin" => $_POST['is_admin']]
        );

        if ($res) {
            $success = "User Inserted";
            helper::redirect("user",1);
        } else {
            $error = "User Not Inserted";
        }
}


?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
            </div>
            <div class="card-body">
                <?php if (strlen($success) > 0): ?>
                    <div class="alert alert-success" role="alert">
                        <?=$success?>
                    </div>
                <?php endif; ?>

                <?php if (strlen($error) > 0): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$error?>
                    </div>
                <?php endif; ?>
                <form action="addUser.php" method="post">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter User Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" name="password" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter User Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Is Admin</label>
                            <input type="text" name="is_admin" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter Is Admin -> 1 or Not -> 0">
                        </div>

                        <button type="submit" name="add" class="btn btn-primary">ADD</button>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<?php include "../main/footer.php"; ?>