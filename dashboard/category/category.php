<?php include "../main/header.php";
//session_start();
//require "../../lib/validation.php";
//require "../../lib/content.php";
// require "../../lib/helper.php";
$res = 0;
$category = new category;
if ($category->getCategoryList() > 0 ) {
    $category_list = $category->getCategoryList();
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
            <a href="addCategory.php">
            <h3 class="card-title btn btn-primary" >Add New Category</h3>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category</th>
                      <th>Details</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(!$res):?>
                    <?php foreach($category_list as $cat):?>
                    <tr>
                      <td><?= $cat['id'] ?></td>
                      <td><?= $cat['name'] ?></td>
                      <td><a href="categoryDetalis.php?id=<?=$cat['id']?>">Details</a></td>
                      <td><a href="update.php?id=<?=$cat['id']?>">Update</a></td>
                      <td><a href="delete.php?id=<?=$cat['id']?>">Delete</a></td>
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