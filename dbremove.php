<?php

include('connection.php');	
$x = $_POST['xy'];

$sql = "DELETE from defaulters where defaulter_key='$x'";
if(!($conn->query($sql)==true)){
	echo "<script type='text/javascript'>alert('ERROR UPDATING DATABASE , TRY AGAIN');
           window.location='admin.html';
		 </script>";
	 $conn->close();  
	 exit();
}
	
$conn->close();

?>