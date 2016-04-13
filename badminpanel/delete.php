<?php 
include('connection.php');

	 if (isset($_GET['id']) && is_numeric($_GET['id']))
	 {
		  $id = $_GET['id'];
	
		  
		   $result = mysqli_query($conn, "DELETE FROM post WHERE pid=$id"); 
			header("Location: all_post.php");
 
	}
	 
	 















?>
