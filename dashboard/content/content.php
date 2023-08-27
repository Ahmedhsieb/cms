<?php include "../main/header.php";
//require "../../lib/validation.php";
//require "../../lib/content.php";
// require "../../lib/db.php";
// require "../../lib/helper.php";
$res = 0;
$content = new content;
if ($content->getContentList(1) > 0 ) {
    $content_list = $content->getContentList(1);
    // print_r($content_list);die;      
}else {
    $res = 1;
}

?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <a href="addContent.php">
            <h3 class="card-title btn btn-primary">Add New Content</h3>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>title</th>
                      <th>Short Desc</th>
                      <th>Main Content</th>
                      <th>Cover</th>
                      <th>Category Name</th>
                      <th>User Name</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(!$res):?>
                    <?php foreach($content_list as $content):?>
                    <tr>
                      <td><?= $content['id'] ?></td>
                      <td><?= $content['title'] ?></td>
                      <td><?= substr($content['short_desc'],0,250)."..." ?></td>
                      <td><?= substr($content['main_content'],0,250)."..." ?></td>
                      <td style="width: 17.5em" ><img class="rounded w-25" src="../../design/img/<?= $content['cover'] ?>" alt="..."></td>
                      <td><?= $content['category_name'] ?></td>
                      <td><?= $content['user_name'] ?></td>
                      <td><a href="update.php?id=<?=$content['id']?>">Update</a></td>
                      <td><a href="delete.php?id=<?=$content['id']?>">Delete</a></td>
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