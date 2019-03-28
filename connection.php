<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	 echo "<script type='text/javascript'>alert('Retry , connection error!');
           window.location='home.html';
		 </script>";
         exit();
}

?>