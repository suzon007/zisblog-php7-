<?php include "sessionforadmin.php";
  if( login_check() ) {  //session verify to show this page Start
 ?>

<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<title>EXPLOITBD | Welcome Admin</title>

<!-- Bootstrap -->
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div >
<div class="row">
  <nav class="navbar navbar-default">
    <div class="container-fluid"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="#">EXPLOIT Admin</a> </div>
      
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
    <button type="button" class="btn btn-primary btn-lg">About</button>
    </div>
  </div>
</div>

<div class="col-md-9" > 
  
  <!-- php code comes here -->
  
  <div class="panel panel-primary">
    <div class="panel-heading">Add new item to the gallery</div>
    <div class="panel-body">
      <?php

         if(isset($_POST['publish']))
         {
            include "connection.php";
			
			
			  $my_title =   $_POST['mytitle'];
			  $my_article =    $_POST['myarticle'];
			  
			  if($my_title=='about'){
			
				$sql = "UPDATE about SET about='$my_article' ;";
				 mysql_select_db('exploitdb');
           		 $retval = mysql_query( $sql, $conn );
				 
			  }
			  else if($my_title=='mission'){
				  $sql = "UPDATE about SET mission='$my_article' ;";
				  mysql_select_db('exploitdb');
            	  $retval = mysql_query( $sql, $conn );
				  
				  }
			else if($my_title=='vision'){
				  $sql = "UPDATE about SET vission='$my_article' ;";
				  mysql_select_db('exploitdb');
           		 $retval = mysql_query( $sql, $conn );
				  
				  }
            
            
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
		header("Refresh:5; url=home.php");
			
            
            mysql_close($conn);
         }
		 
         else
         { 
            ?>
      <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
        <div class="form-group">
         <div class="dropdown">
          <select name="mytitle" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li>
            <option value="NoCat">Select Category</option>
            </li>
            <li>
            <option value="about">About</option>
            </li>
            <li>
            <option value="mission">Mission</option>
            </li>
            <li>
            <option value="vision">Vision and Goal</option>
            </li>
           
            </ul>
          </select>
        </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Item Description</label>
          <textarea class="form-control ckeditor" rows="5" name="myarticle" placeholder="Write Article" required > </textarea>
        </div>
        <input type="submit" name="publish" class="btn btn-primary" style="margin-top: 20p;" value="Update">
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
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php } else  echo "<h1>"."Error 404! Not found"."</h1><br>"."Soory the page you are looking for not found!"; ?>
