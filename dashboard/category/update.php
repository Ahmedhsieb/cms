<?php 
include "../main/header.php";
//require "../../lib/validation.php";
//require "../../lib/category.php";

//session_start();
$success = '';
$error = '';
$category = new category;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$cat = $category->getCategoryById($id);

if (isset($_POST['category'])) {
    $validation = validation::string_empty($_POST['category']);

    if ($validation == false) {

        $res = $category->updateCategory(
        $_POST['id'], 
        ["name" => $_POST['category']]);

    if ($res) {
        $success = "Category Updated";
        session_destroy();
        helper::redirect("category",1);
    } else {
        $error = "Category Not Updated";
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
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="category" value="<?= $cat['name']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter New Category">
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