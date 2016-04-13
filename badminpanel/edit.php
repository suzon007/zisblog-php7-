<?php include "sessionforadmin.php";
include "connection.php";
  if( login_check() ) {  //session verify to show this page Start
   ?>
   <html>
   <html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZIS BLOG | Welcome Suzon</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/for_modal.js"></script>
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div >
      <div class="row">
        <nav class="navbar navbar-default">
          <div class="container-fluid"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="#">ZIS Admin</a> </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
                  <li><a href="../index.php">Visit Site</a></li>
                  <li><a href="all_post.php">Edit</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <?php if( login_check() ) { ?>
                  <li><a href="logout.php">Logout</a></li>
                  <?php } else {}?>
                </ul>
              </div>
              <!-- /.navbar-collapse --> 
            </div>
            <!-- /.container-fluid --> 
          </nav>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="alert alert-info" role="alert">
              <h3 align="center">Hello <?php echo $_SESSION['admin']; ?></h3>
              <hr>
            </div>
          </div>
          <div class="col-md-9" > 

            <!-- php code comes here -->

            <div class="panel panel-primary">
              <div class="panel-heading">All Items</div>
              <div class="panel-body"> 
                <!--================================-->
                <?php

		   //$result = mysql_query("DELETE FROM datatable WHERE id=$id")
		    //or die(mysql_error()); 
			//header("Location: all_post.php");


                if (isset($_GET['id']) && is_numeric($_GET['id']))
                {
                 $id = $_GET['id'];
                 $sql = "SELECT * FROM post WHERE pId=$id";
                 $result = mysqli_query($conn, $sql);

                 while($post = mysqli_fetch_array($result)) {
                   ?>
                   <div class="media">

                    <!--<div class="media-left"> <a href="#"> <img class="media-object" src="" style="height: 64px; width: 64px;" alt="IMAGE"> </a> </div>-->
                    <div class="media-body" style="width: 700px;"> 

                      <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                        <fieldset class="form-group" >
                          <label for="exampleInputEmail1">Edit Post Title</label>
                          <input type="text"  class="form-control" name="post_title" id="exampleInputEmail1" value="<?php echo $post['pTitle']; ?>">
                        </fieldset>
                        <fieldset class="form-group">
                          <label for="exampleTextarea">Edit Post</label>
                          <textarea class="form-control" name="post_article" id="exampleTextarea" rows="8" ><?php echo $post['post']; ?></textarea>
                        </fieldset>

                        <button type="submit" name="publish" class="btn btn-default btn-sm pull-right" style="margin-left:20px;" > UPDATE </button>

                      </form>

                      <?php } }?>
                      <?php
                      if(isset($_POST['publish']))
                      {
                        $title = $_POST['post_title'];
                        $article = $_POST['post_article'];
                        $id = $_GET['id'];
                        $sql = "UPDATE post SET pTitle='$title', post='$article' WHERE pId=$id";
                        $result = mysqli_query($conn, $sql);

                        ?>
                        <script>
                        alert("POST UPDATED!");
                        window.location.href = "all_post.php";
                        </script>
                        <?php
                      }

                      ?>
                    </div>
                  </div>
                  <hr style="height:5px !important; background-color:#337ab7;">

                  <!--===================================--> 
                  <!--==========MODAL=============-->


                  <!--===========================-->
                </div>
              </div>
            </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="../js/bootstrap.min.js"></script>
          </body>
          </html>
          <?php } else  echo "<h1>"."Error 404! Not found"."</h1><br>"."Soory the page you are looking for not found!"; ?>

