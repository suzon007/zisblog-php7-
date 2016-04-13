<?php
include "sessionforadmin.php";
include "connection.php";

if(isset($_POST["admin_login"])){

if(!empty($_POST['name']) && !empty($_POST['password'])) {
	$user=$_POST['name'];
	$pass=$_POST['password'];
	
	$user = mysql_real_escape_string($user);
	$pass= md5( mysql_real_escape_string($pass));
	
	$query=mysql_query("SELECT * FROM admin WHERE admin_name='".$user."' AND password='".$pass."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbusername=$row['admin_name'];
	$dbpassword=$row['password'];
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