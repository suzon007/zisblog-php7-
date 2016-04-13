<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <title>Admin Login</title>
</head>

<body class="container-fluid" style="background-color:#6a5750 !important;  ">
  <br><br>
  <div class="jumbotron" style="background-color:#b5a397 !important;">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel panel-success" style="box-shadow:rgba(0,0,0,0.2) 0px 0px 10px;
        -webkit-box-shadow:rgba(0,0,0,0.2) 0px 0px 10px;
        -moz-box-shadow:rgba(0,0,0,0.2) 0px 0px 10px;">
        <div class="panel-body">
          <h2>Welcome Admin </h2><hr>
          <div class="panel-heading"> <h4>Please, Login to be Blue!</h4> </div>
          <div class="panel-body">
            <form role="form" method="post" action="<?php $_PHP_SELF ?>">
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Admin ID" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                  <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password" required>
                </div>
              </div>
              <hr/>
              <!--   <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>-->
              <button type="submit" class="btn btn-warning" name="admin_login"> Sign In</button>
              <p><br/>
              </p>

            </form>
          </div>
        </div>
      </div></div>
    </div></div>
  </body>
  </html>

  <?php

  include "sessionforadmin.php";
  include "connection.php";

  if(isset($_POST["admin_login"])){


    if(!empty($_POST['name']) && !empty($_POST['password'])) {
     $user=$_POST['name'];
     $pass=$_POST['password'];


     $user = mysqli_real_escape_string($conn , $user);
     $pass= md5( mysqli_real_escape_string($conn , $pass));

     $sql = "SELECT * FROM admin_login WHERE adminName = '$user' AND adminPass = '$pass'";
     $result = mysqli_query($conn, $sql);

     $numrows=mysqli_num_rows($result);


     if($numrows!=0)
     {
       while($row=mysqli_fetch_assoc($result))
       {
         $dbusername=$row['adminName'];
         $dbpassword=$row['adminPass'];
       }

       if($user == $dbusername && $pass == $dbpassword)
       {

         user_login( $user );

         /* Redirect browser */
         header("Location: home.php");
       }
     } else {
       ?>
       <script>
       alert("Invalid username or password!");
       document.location.href='index.php';
       </script>
       <?php 
     }

   } else { ?>
   <script>
   alert("All Field are required!");
   document.location.href='index.php';
   </script>
   <?php 
 }
}

?>