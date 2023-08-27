<?php include "../main/header.php";
//session_start();
//require "../../lib/validation.php";
//require "../../lib/content.php";
// require "../../lib/helper.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
}
$res = 0;
$category = new category;
$content_list = (new content)->getContentByCategory($id);
if ($category->getCategoryById($id) > 0 ) {
    $category_list = $category->getCategoryById($id);
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
                <h3><?=$category_list['name']?></h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Content Title</th>
                        <th>Content Short Desc</th>
                        <th>Content</th>
                        <th>Cover</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!$res):?>
                        <?php foreach($content_list as $con):?>
                            <tr>
                                <td><?= $con['id'] ?></td>
                                <td><?= $con['title'] ?></td>
                                <td><?= substr($con['short_desc'],0,250)."..." ?></td>
                                <td><?= substr($con['main_content'],0,250)."..." ?></td>
                                <td style="width: 17.5em"><img class="rounded w-25" src="../../design/img/<?= $con['cover'] ?>" alt="..."></td>
                                <td><a href="deleteContent.php?id=<?=$con['id']?>">Delete</a></td>
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