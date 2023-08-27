<?php 
include "../main/header.php";   
//require "../../lib/content.php";

$success = '';
$error = '';
//session_start();

// $category_data = $_SESSION['category'];
$category_data = (new category)->select("category", "*")->getAll();


if (isset($_POST['title'])) {

    $title = addslashes($_POST['title']);
    $short_desc = addslashes($_POST['short_desc']);
    $main_content = addslashes(rtrim($_POST['main_content'],'\\'));
    $category_id = $_POST['category'];
    // $user_id = $_SESSION['user']['id'];
    $tmp = $_FILES['cover']['tmp_name'];
    $imgname = $_FILES['cover']['name'];
    move_uploaded_file($tmp,"../../design/img/".$imgname);

    $content = new content;
    $res = $content->addContent(
    ["title" => $title,
     "short_desc" => $short_desc,
     "main_content" => $main_content,
     "cover" => $imgname,
     "category_id" => $category_id
    //  ,"user_id" => $user_id
    ]);

    if ($res) {
        $success = "Content Inserted";
        helper::redirect("content",1);
    } else {
        $error = "Content Not Inserted";
    }
    }

?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Content</h3>
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
            <form action="addContent.php" method="post" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiltle</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter The Content Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Short Desc</label>
                        <input type="text" name="short_desc" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Short Description">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Main Content</label>
                        <textarea id="summernote" name="main_content"></textarea>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="category" class="form-control select2bs4 select2-hidden-accessible">
                    <!-- <option>None</option> -->
                        <?php foreach($category_data as $category):?>
                        <option value="<?=$category['id']?>"><?=$category['name']?></option>
                        <?php endforeach;?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                      <div class="custom-file">
                        <input name="cover" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
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