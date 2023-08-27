<?php
include "../main/header.php";
//session_start();
//require "../../lib/setting.php";
//require "../../lib/validation.php";
//require "../../lib/content.php";
// require "../../lib/helper.php";
$res = 0;
$setting = new setting;
if ($setting->getSettingList() > 0 ) {
    $setting_list = $setting->getSettingList();
//    print_r($user_list);die;
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
                <a href="addSetting.php">
                    <h3 class="card-title btn btn-primary" >Add New Setting</h3>
                </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>setting_value</th>
                        <th>setting Theme</th>
                        <th>Apply</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!$res):?>
                        <?php foreach($setting_list as $set):?>
                            <tr>
                                <td><?= $set['id'] ?></td>
                                <td><?= $set['setting_value'] ?></td>
                                <td style="width: 17.5em" ><img class="rounded w-25" src="../../design/img/theme/<?= $set['setting_value'] ?>.png" alt="..."></td>
                                <td><a href="apply.php?id=<?=$set['id']?>">Apply</a></td>
                                <td><a href="delete.php?id=<?=$set['id']?>">Delete</a></td>
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