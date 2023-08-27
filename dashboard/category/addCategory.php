<?php 
include "../main/header.php";
//require "../../lib/validation.php";
//require "../../lib/category.php";
// require "../../lib/helper.php";
$success = '';
$error = '';

if (isset($_POST['category'])) {
    $validation = validation::string_empty($_POST['category']);

    if ($validation == false) {
        $category = new category;
    $res = $category->addCategory(
        ["name" => $_POST['category']]
    );

    if ($res) {
        $success = "Category Inserted";
        helper::redirect("category",1);
    } else {
        $error = "Category Not Inserted";
    }
    }else{
        $error = "Category Name is required";
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
            <form action="addCategory.php" method="post">
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="category" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter New Category">
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