<?php

include('connection.php');

$sql = "select * from visitors order by visitor_key desc limit 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if(!($row['visitor_key'])){
	   echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='passgeneration.php';
		 </script>";
	 $conn->close();  
	 exit();
	}
$visitor_key = $row['visitor_key'];
$visitor_id = $row['visitor_id'];
$visitor_gender = $row['visitor_gender'];
$visitor_contact = $row['visitor_contact'];
$visitor_email = $row['visitor_email'];
$visitor_name = $row['visitor_name'];
$visitor_image = $row['visitor_image'];

$sql = "select * from visits where visitor_key_fk='$visitor_key'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if(!($row['visitor_key_fk'])){
	   echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='passgeneration.php';
		 </script>";
	 $conn->close();  
	 exit();
	}
$visitee_id = $row['visitee_id_fk'];
$purpose = $row['purpose_of_visit'];


$sql = "select * from visitee where visitee_id='$visitee_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if(!($row['visitee_id'])){
	   echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='passgeneration.php';
		 </script>";
	 $conn->close();  
	 exit();
	}
$visitee_name = $row['visitee_name'];
$visitee_department = $row['visitee_department'];
$visitee_designation = $row['visitee_designation'];

$conn->close();

?>