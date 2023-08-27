<?php
//require "lib/content.php";
//require "lib/setting.php";
//session_start();
require "lib/auth.php";

$setting = new setting;
$content = new content;
$category = new category;
$auth = new auth;

$is_login = $auth->is_login();

if ($is_login)
    $is_admin = $auth->is_admin();

$setting_list = $setting->getSettingList();
$content_list = $content->getContentList(0);
$category_list = $category->getCategoryList();

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
} else {
    $category_id = 0;
}
$content_by_category_id = $content->getContentByCategory($category_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS - Blog list</title>

    <!-- Styles -->
    <link href="design/frontend/css/core.min.css" rel="stylesheet">
    <link href="design/frontend/css/thesaas.min.css" rel="stylesheet">
    <link href="design/frontend/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="design/frontend/img/apple-touch-icon.png">
    <link rel="icon" href="design/frontend/img/favicon.png">
</head>

<body>


<!-- Topbar -->
<nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <a class="topbar-brand" href="index.php">
                <img class="logo-default" src="design/frontend/img/logo.png" alt="logo">
                <img class="logo-inverse" src="design/frontend/img/logo-light.png" alt="logo">
            </a>
        </div>


        <div class="topbar-right">
            <ul class="topbar-nav nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Category<i class="fa fa-caret-down"></i></a>
                    <div class="nav-submenu">
                        <a class="nav-link" href="index.php?id=0">All</a>
                        <?php foreach ($category_list as $cat): ?>
                            <a class="nav-link" href="index.php?id=<?= $cat['id'] ?>"><?= $cat['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Blog <i class="fa fa-caret-down"></i></a>
                    <div class="nav-submenu">
                        <?php foreach ($setting_list as $set): ?>
                            <a class="nav-link" href="dashboard/setting/apply.php?id=<?= $set['id'] ?>">Blog <?= $set['setting_value'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>

                <?php if ($is_login): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Adminastrator<i class="fa fa-caret-down"></i></a>
                        <div class="nav-submenu">
                            <a class="nav-link" href="dashboard/category/category.php">Category</a>
                            <a class="nav-link " href="dashboard/content/content.php">Content</a>
                            <a class="nav-link " href="dashboard/comment/comment.php">Comment</a>
                            <a class="nav-header" style="font-size: 11px; color: #2b3e50">Setting</a>
                            <a class="nav-link" href="dashboard/setting/setting.php">Setting</a>
                            <?php if ($is_admin): ?>
                                <a class="nav-link" href="dashboard/user/user.php">Users</a>
                            <?php endif; ?>
                            <a class="nav-link" href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

    </div>
</nav>
<!-- END Topbar -->


<!-- Header -->
<header class="header header-inverse" style="background-color: #000000">
    <div class="container text-center">

        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">

                <h1>Latest Blog Posts</h1>
                <p class="fs-20 opacity-70">Read and get updated on how we progress.</p>

            </div>
        </div>

    </div>
</header>
<!-- END Header -->


<!-- Main container -->
<main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Basic cards
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <section class="section bg-gray">
        <div class="container">
            <?php if(isset($_SESSION['applied'])):?>
            <?php include "design/theme/{$_SESSION['setting']}.html"?>
            <?php else:?>
            <?php include "design/theme/list.html"?>
            <?php endif;?>
        </div>
    </section>


</main>
<!-- END Main container -->


<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                    <a href="index.html"><img src="design/frontend/img/logo.png" alt="logo"></a>
                </p>
            </div>

            <div class="col-12 col-lg-6">

            </div>

            <div class="col-12 col-lg-3">
                <div class="social text-center text-lg-right">
                    <a class="social-facebook" href="https:/www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="https:/twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https:/www.instagram.com/thethemeio/"><i
                                class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="https:/dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END Footer -->


<!-- Scripts -->
<script src="design/frontend/js/core.min.js"></script>
<script src="design/frontend/js/thesaas.min.js"></script>
<script src="design/frontend/js/script.js"></script>

</body>
</html>
