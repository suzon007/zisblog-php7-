<?php include "sessionforadmin.php";
  if( login_check() ) {  //session verify to show this page Start
   ?>

   <html>
   <html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ZIS BLOG | Welcome Suzon </title>

    <!-- Check Editor for editing post -->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css">

  </head>
  <body>
    <div >
      <div class="row">
        <nav class="navbar navbar-default">
          <div class="container-fluid"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="#">ZIS BLOG Admin</a> </div>

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
            <div class="alert alert-info" role="alert">
              <h3 align="center">Edit</h3>
              <hr>
              <div style="padding-left:18%;">
                <a href="all_post.php"><button type="button" class="btn btn-primary btn-lg">Post</button></a>
                <a href="about.php"><button type="button" class="btn btn-primary btn-lg">About</button></a>
              </div>
            </div>
          </div>
          <div class="col-md-9" > 

            <!-- php code comes here -->

            <div class="panel panel-primary">
              <div class="panel-heading">New Blog Post</div>
              <div class="panel-body">
         
         <?php

            if(isset($_POST['publish']))
            {
                  include "connection.php";

				// working with image file start
              
                  $my_image_name =  $_FILES['myimage']['name']; 
                  $my_image_type =  $_FILES['myimage']['type']; 
                  $my_image_size =  $_FILES['myimage']['size']; 
                  $my_image_tmp_name =  $_FILES['myimage']['tmp_name'];


		          		if($my_image_size!=NULL && $my_image_size > 1000000){ //1MB
			           		echo "<script>alert('Image is too large!');</script>";
			           		header("Refresh:1; url=home.php");
			           		exit;
			           	}
				
                 if(in_array($my_image_type , array("jpg","jpeg","png"))){
                    echo "<script>alert('Only Jpeg, Jpg and png allowed!');</script>";
                    header("Refresh:1; url=home.php");
                    exit;
                  }

                 else {	
                    $type = explode('.', $_FILES["myimage"]["name"]);
                    $type = $type[count($type)-1];
                    if($type != NULL)
                    {
                     $newfilename=uniqid(rand()).".".$type;
                     $url = "badminpanel/img/".$newfilename;
				          	//$uploads_dir = 'img/';
                     move_uploaded_file($_FILES['myimage']['tmp_name'],"img/$newfilename");
                     echo "Success!";
                   }
                   else
                   {
                     $url = NULL;
                   }
                  }

				// working with image file end
             
                 $my_title =   $_POST['mytitle'];
                 $my_article =    $_POST['myarticle'];
                 $my_cat = $_POST['mycategory'];



                 $sql = "INSERT INTO post ". "(pId, pTitle, post, pCat, pTime, pImg) ". "VALUES('NULL' ,'$my_title','$my_article', '$my_cat',now(), '$url' )";


                 // mysqli_select_db($conn, 'exploitdb');
                 $retval = mysqli_query($conn, $sql);

                if(! $retval )
                {
                 echo '
                 <div class="alert alert-warning alert-success" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Failed!</strong> Post is not published! ';
                die('Could not enter data: ' . mysql_error());

                echo '
                Problem is:
                </div> 
                ';
                }

                echo '
                <div class="alert alert-success alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Your Post Published Successfully! Redirecting..
                </div>
                ';
	              	//header("Refresh:14; url=home.php");


                mysqli_close($conn);
            }

    else
    { 
      ?>
      <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Post Title</label>
          <input class="form-control" name="mytitle" required />
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Post Description</label>
          <textarea class="form-control ckeditor" rows="5" name="myarticle" placeholder="Write Article" required > </textarea>
        </div>
        <div class="dropdown">

          <select name="mycategory" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><option value="NoCat">Select Category</option></li>
              <li><option value="Web">Web Development</option></li>
              <li><option value="Inspiration">Inspiration</option></li>
              <li><option value="Tour">Tour</option></li>
              <li><option value="Tech">Tech</option></li>
              <li><option value="Others">Others</option></li>
            </ul>
          </select>
        </div>

        <div class="form-group" style="margin-top: 20px">
          <label for="exampleInputFile">Select Image</label>
          <input type="file" id="fileToUpload" name="myimage">
          <p class="help-block">Example .jpg .jpeg .png</p>
          <p class="help-block" style="color:red;">Please Try to use smaller size images.</p>
        </div>
        <input type="submit" name="publish" class="btn btn-primary" style="margin-top: 20p;" value="Publish Article">
        

      </form>
      <?php
    }

    ?>
  </div>
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php } else  echo "<h1>"."Error 404! Not found"."</h1><br>"."Soory the page you are looking for not found!"; ?>
