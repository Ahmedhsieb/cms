<?php
include "../main/header.php";
//require "../../lib/validation.php";
//require "../../lib/category.php";
// require "../../lib/helper.php";
$success = '';
$error = '';

if (isset($_POST['setting'])) {
    $validation = validation::string_empty($_POST['setting']);

    if ($validation == false) {
        $setting = new setting;
        $res = $setting->addSetting(["setting_value"=>$_POST['setting']]);

        if ($res) {
            $success = "Setting Inserted";
            helper::redirect("setting",1);
        } else {
            $error = "Setting Not Inserted";
        }
    }else{
        $error = "Setting Name is required";
    }

}


?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Setting</h3>
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
                <form action="addSetting.php" method="post">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Setting Value</label>
                            <input type="text" name="setting" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter New Setting Value">
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