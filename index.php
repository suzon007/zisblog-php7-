<?php
include "connection.php";
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ZIS Blog</title>
    <meta name="description" content="website technology personal thought trends music career web development">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
    
</head>
<body>
    <div class="responsive-header visible-xs visible-sm" style="z-index: 1;">
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

           <!-- <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="#">Zahidul Islam Suzon</a>
            </div> -->


            <a href="#" class="toggle-menu" ><i class="fa fa-bars"></i></a>
            <div class="main-navigation responsive-menu">
                <ul class="nav navbar-nav">
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
    <div class="sidebar-menu hidden-xs hidden-sm" >
        <div class="top-section">
            <h3 class="profile-title">Zahidul Islam Suzon</h3>
            <p class="profile-description">Web Developer</p>
        </div> <!-- top-section -->
        <div class="main-navigation">
            <ul class="navigation" >
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


    <div class="banner-bg" id="top">
        <div class="banner-overlay"></div>
        <div class="welcome-text">
            <h2>WELCOM | ZIS BLOG</h2>
            <h5>Perfection is not attainable, but if we chase perfection we can catch excellence. </h5>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="fluid-container">

            <div class="content-wrapper">

                <!-- ABOUT -->
                <!-- multiple blog posts -->
                <?php
                $sql = "SELECT * FROM post ORDER BY pId DESC";
                $result = mysqli_query($conn, $sql);

                while($post = mysqli_fetch_array($result)) {
                   ?>
                   <div class="page-section" id="about">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="widget-title"><strong><a href="fullpost.php?pId=<?php echo $post['pId']; ?>"><?php echo $post['pTitle']; ?></a></strong></h1>
                            <?php if ($post['pImg']!= NULL) {

                                ?>
                                <div class="about-image">

                                    <img src="<?php echo $post['pImg']; ?>" alt="Post Main Image" class="img-responsive" style="height:350px;">

                                </div>
                                <?php } ?>
                                <p><?php echo substr($post['post'], 0,1000); ?><br><a href="fullpost.php?pId=<?php echo $post['pId']; ?>"><span class="label label-danger">READ MORE</span></a></p>
                                <hr>
                            </div>
                        </div> <!-- #about -->
                    </div>
                    <?php } ?>
                    <!-- mutiple blog posts ends -->

                    <div class="row" id="footer">
                        <div class="col-md-12 text-center">
                            <p class="copyright-text">Copyright &copy; Zahidul Islam Suzon</p>
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