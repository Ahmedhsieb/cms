<?php
include "../main/header.php";
//require "../../lib/validation.php";
//require "../../lib/content.php";

//session_start();
$success = '';
$error = '';

if (isset($_GET['id'])) {
    $_SESSION['content_id'] = $_GET['id'];
}
$content = new content;
$category_data = (new category)->select("category", "*")->getAll();
$con = $content->getContentRow($_SESSION['content_id'], 0);
//echo $con['main_content'];die;
//print_r($con);die;

if (isset($_POST['title'])) {
    $title = addslashes($_POST['title']);
    $short_desc = addslashes($_POST['short_desc']);
    $main_content = addslashes($_POST['main_content']);
    $category_id = $_POST['category'];
    // $user_id = $_SESSION['user']['id'];
    $tmp = $_FILES['cover']['tmp_name'];
    $imgname = $_FILES['cover']['name'];
    move_uploaded_file($tmp, "../../design/img/" . $imgname);

    $res = $content->updateContent(
        $_POST['id'],
        [
            "title" => $title,
            "short_desc" => $short_desc,
            "main_content" => $main_content,
            "cover" => $imgname,
            "category_id" => $category_id
        ]);

    if ($res) {
        $success = "Content Updated";
        session_destroy();
        helper::redirect("content", 0);
    } else {
        $error = "Content Not Updated";
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
                        <?= $success ?>
                    </div>
                <?php endif; ?>

                <?php if (strlen($error) > 0): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <form action="update.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiltle</label>
                            <input type="text" value="<?= $con['title'] ?>" name="title" class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Enter The Content Title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Short Desc</label>
                            <input type="text" value="<?= $con['short_desc'] ?>" name="short_desc" class="form-control"
                                   id="exampleInputEmail1"
                                   placeholder="Enter Short Description">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Main Content</label>
                            <textarea id="summernote2" name="main_content" id="exampleInputPassword1"
                                      value=<?=$con['main_content']?>></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="category" class="form-control select2bs4 select2-hidden-accessible">
                                <?php foreach ($category_data as $category): ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="custom-file">
                                <input type="file" name="cover" value="<?= $con['cover']?>" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                        <button type="submit" name="add" class="btn btn-primary">Update</button>
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