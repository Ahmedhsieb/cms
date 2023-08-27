<?php
include "../main/header.php";
//require "../../lib/user.php";
//require "../../lib/helper.php";
$success = '';
$error = '';
$user = new user;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$user_by_id = $user->getUserById($id);

if (isset($_POST['name'])) {


        $res = $user->updateUser(
            $_POST['id'],
            ["name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "is_admin" => $_POST['is_admin']]);

        if ($res) {
            $success = "User Updated";
            helper::redirect("user",1);
        } else {
            $error = "User Not Updated";
        }

}


?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Category</h3>
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
                <form action="update.php?id=<?=$id?>" method="post">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" name="name" value="<?=$user_by_id['name']?>" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="<?=$user_by_id['email']?>" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter User Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" name="password" value="<?=$user_by_id['password']?>" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter User Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Is Admin</label>
                            <input type="text" name="is_admin" value="<?=$user_by_id['is_admin']?>" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter Is Admin -> 1 or Not -> 0">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$_GET['id']; ?>">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
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