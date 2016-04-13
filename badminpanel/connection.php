<?php
	/*$dbhost = "localhost";
	$bduser = "root";
	$dbpass = "12";
	$db = "zis_blog";

	mysql_connect($dbhost,$bduser,$dbpass);
	mysql_select_db($db);

*/

$servername = "localhost";
$username = "root";
$password = "";
$db = "zis_blog";

// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn, $db);
mysqli_query($conn, 'SET CHARACTER SET utf8');
mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>