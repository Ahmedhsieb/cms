<?php
//require "lib/content.php";
require "lib/comment.php";

$content = new content;
$comment = new comment;

$comment_list = $comment->getCommentList($_GET['id']);

$content_list = $content->getContentRow($_GET['id'],1);
//print_r($content_list);die;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS - Blog post</title>

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
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

          </ul>
        </div>

      </div>
    </nav>
    <!-- END Topbar -->



    <!-- Header -->
    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url(design/frontend/img/bg-cup.jpg);" data-overlay="8">
      <div class="container text-center">

        <div class="row h-full">
          <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

            <p class="opacity-70"><?= $content_list['category_name'];?></p>
            <br>
            <h1 class="display-4 hidden-sm-down"><?= $content_list['title']; ?></h1>

            <br><br>
            <p><span class="opacity-70 mr-8">By</span> <a class="text-white" href="#"><?= $content_list['user_name'];?></a></p>
            <p><img class="rounded-circle w-75" src="design/frontend/img/avatar/2.jpg" alt="..."></p>

          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-content"><span></span></a>
          </div>

        </div>

      </div>
    </header>
    <!-- END Header -->




    <!-- Main container -->
    <main class="main-content">



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section" id="section-content">
        <div class="container">

          <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
              
              <p class="lead"><?= $content_list['main_content']; ?></p>

              
            </div>            
          </div>

        </div>
      </div>





      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bt-1 bg-grey">
        <div class="container">

          <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">

              <div id="media-list" class="media-list">
                <?php if(!empty($comment_list)): ?>
                  <?php foreach($comment_list as $co): ?>
                <div class="media">
                  <img class="rounded-circle w-40" src="design/frontend/img/avatar/1.jpg" alt="...">

                  <div class="media-body">
                    <p class="fs-14">
                      <strong><?=  $co['name']; ?></strong>
                    </p>
                    <p class="fs-13"><?=  $co['comment']; ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                  <h1>comment not found</h1>
                  <?php endif; ?>
              </div>


              <hr>


              <!-- <form action="#" method="POST"> -->

                <div class="row">
                  <div class="form-group col-12 col-md-6">
                    <input id="name" class="form-control" type="text" placeholder="Name">
                  </div>

                  <div class="form-group col-12 col-md-6">
                    <input id="email" class="form-control" type="text" placeholder="Email">
                  </div>
                </div>
                <input id="blog_id" type="hidden" value="<?= $content_list['id']; ?>" class="form-control" type="text" placeholder="Email">

                <div class="form-group">
                  <textarea id="comment" class="form-control" placeholder="Comment" rows="4"></textarea>
                </div>

                <button onclick="sendcomment()" class="btn btn-primary btn-block" type="submit">Submit your comment</button>
              <!-- </form> -->

            </div>
          </div>

        </div>
      </div>





    </main>
    <!-- END Main container -->






    <!-- Footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row gap-y align-items-center">
          <div class="col-12 col-lg-3">
            <p class="text-center text-lg-left">
              <a href="index.php"><img src="design/frontend/img/logo.png" alt="logo"></a>
            </p>
          </div>

          <div class="col-12 col-lg-6">
          </div>

          <div class="col-12 col-lg-3">
            <div class="social text-center text-lg-right">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->



    <!-- Scripts -->
    <script src="design/frontend/js/core.min.js"></script>
<!-- jQuery -->
<!--<script src="design/backend/plugins/jquery/jquery.min.js"></script>-->
    <script src="design/frontend/js/thesaas.min.js"></script>
    <script src="design/frontend/js/script.js"></script>
    <script>
      function sendcomment(){
        let name = $("#name").val();
        let email = $("#email").val();
        let comment = $("#comment").val();
        let blog_id = $("#blog_id").val();
        // console.log(name, email, comment, blog_id);

        $.ajax({
          type:'POST',
          url:"sendReview.php",
          data:{name:name,comment:comment,email:email,blog_id:blog_id},
          success:function(){


              let html = `
              <div class='media'>
                  <img class='rounded-circle w-40' src='design/frontend/img/avatar/1.jpg' alt='...'>
                  <div class='media-body'>
                    <p class='fs-14'>
                      <strong>${name}</strong>
                    </p>
                    <p class='fs-13'>${comment}</p>
                  </div>
                </div>
              `;
              $("#media-list").append(html);
          },
          error:function(){
          }
        });
      }
    </script>              
  </body>
</html>
