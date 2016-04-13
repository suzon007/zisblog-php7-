<?php
include "connection.php";

$post_id = $_GET['pId'];

?>
<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FULL POST</title>
    <meta name="description" content="website technology personal thought trends music career web development">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fullpost.css">
    <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
    <!-- FACEBOOK COMMENT -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=435108306669517";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <!-- FACEBOOK COMMEN ENDS -->
  <div class="responsive-header visible-xs visible-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-section">
                    <div class="profile-image">
                        <img src="assets/img/profile.jpg" alt="Suzon Portrait">
                    </div>
                    <div class="profile-content">
                        <h3 class="profile-title">Zahidul Islam Suzon</h3>
                        <p class="profile-description">Web Developer</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
        <div class="main-navigation responsive-menu">
            <ul class="navigation">
                <li><a href="index.php"><i class="fa fa-home"></i>HOME</a></li>
                    <li><a href="http://localhost/zisblog/category.php?cat=Web"><i class="fa fa-laptop"></i>WEB DEVELOPMENT</a></li>
                    <li><a href="http://localhost/zisblog/category.php?cat=Inspiration"><i class="fa fa-heart-o"></i>INSPIRATION</a></li>
                    <li><a href="http://localhost/zisblog/category.php?cat=Tour"><i class="fa fa-bus"></i>TOUR</a></li>
                    <li><a href="http://localhost/zisblog/category.php?cat=Tech"><i class="fa fa-magic"></i>TECH</a></li>
                    <li><a href="http://localhost/zisblog/category.php?cat=Others" ><i class="fa fa-gamepad"></i>OTHERS</a></li>
                    <li><a href="http://zisuzon.com"><i class="fa fa-link"></i>PORTFOLIO</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar-menu hidden-xs hidden-sm">
    <div class="top-section">
        <h3 class="profile-title">Zahidul Islam Suzon</h3>
        <p class="profile-description">Web Developer</p>
    </div> <!-- top-section -->
    <div class="main-navigation">
        <ul class="navigation">
           <li><a href="index.php"><i class="fa fa-home"></i>HOME</a></li>
                <li><a href="category.php?cat=Web"><i class="fa fa-laptop"></i>WEB DEVELOPMENT</a></li>
                <li><a href="category.php?cat=Inspiration"><i class="fa fa-heart-o"></i>INSPIRATION</a></li>
                <li><a href="category.php?cat=Tour"><i class="fa fa-bus"></i>TOUR</a></li>
                <li><a href="category.php?cat=Tech"><i class="fa fa-magic"></i>TECH</a></li>
                <li><a href="category.php?cat=Others" ><i class="fa fa-gamepad"></i>OTHERS</a></li>
                <li><a href="http://zisuzon.com"><i class="fa fa-link"></i>PORTFOLIO</a></li>
        </ul>
    </div> <!-- .main-navigation -->
    <div class="social-icons">
        <ul>
            <li><a href="https://www.facebook.com/zisuzon"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/zisuzon"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/in/zisuzon"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://plus.google.com/u/0/108724152935013687074/posts"><i class="fa fa-google-plus"></i></a></li>
        </ul>
    </div> <!-- .social-icons -->
</div> <!-- .sidebar-menu -->


<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <!-- ABOUT -->
            <?php
                $sql = "SELECT * FROM post WHERE pId = $post_id";

                $result = mysqli_query($conn, $sql);

                while($post = mysqli_fetch_array($result)) {
                 ?>
            <div class="page-section" id="about">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="widget-title"><strong><?php echo $post['pTitle']; ?></strong></h1>
                        <p id="author"><span><b>BY:</b> <a href="">ZISuzon</a></span> <span><b>Time: </b><?php echo $post['pTime']; ?> </span> </p>
                        <?php if ($post['pImg']!= NULL) {

                                ?>
                        <div class="about-image">
                            <img src="<?php echo $post['pImg']; ?>" alt="about me">
                        </div>
                        <?php } ?>
                        <p><?php echo $post['post']; ?></p>
                            <hr style="margin-bottom:30px;">

                        </div>
                    </div> <!-- #about -->
                </div>
                <?php } ?>
                <div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?> data-layout="standard" data-action="like" data-show-faces="true" data-share="true" data-width="100%"></div>
                <hr>
                <div class="fb-comments" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?> data-width="100%" data-numposts="5"></div>
                <div class="row" id="footer">
                    <div class="col-md-12 text-center">
                        <p class="copyright-text">Copyright &copy; 2016 Zahidul Islam Suzon</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="assets/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/zis.js"></script>
    <script src="assets/js/min/plugins.min.js"></script>
    

</body>
</html>