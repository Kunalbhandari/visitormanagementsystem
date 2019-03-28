<?php

include('connection.php');
	
$x = $_POST['xy'];
$date = getdate();
$da = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
$ti = $date['hours'].':'.$date['minutes'].':'.$date['seconds'];

$sql = "update visitors set check_out_date='$da',check_out_time='$ti' where visitor_key='$x'";
if($conn->query($sql)==true){
	echo "<script type='text/javascript'>alert('well done');
		 </script>";
}

else{
	echo "<script type='text/javascript'>alert('ERROR FETCHING DATA , TRY AGAIN');
           window.location='check_off.php';
		 </script>";
	 $conn->close();  
	 exit();
}

$sql = "select visitor_key,visitor_id,visitor_name,visitor_contact from visitors where visitor_key='$x'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
if(!($row['visitor_key'])){
   echo "<script type='text/javascript'>alert('visitor_key not found , TRY AGAIN');
           window.location='blacklist.php';
		 </script>";
	 $conn->close();  
	 exit();
}
$key = $row['visitor_key'];
$id = $row['visitor_id'];
$name = $row['visitor_name'];
$contact = $row['visitor_contact'];


$sql = "insert into defaulters values('$key','$id','$name','$contact')";
if($conn->query($sql)==true){
	echo "<script type='text/javascript'>alert('well done');
		 </script>";
}
else{
	echo "<script type='text/javascript'>alert('ERROR FETCHING DATA , TRY AGAIN');
           window.location='blacklist.php';
		 </script>";
	 $conn->close();  
	 exit();
}


$sql = "delete from current_visitors where cur_visitor_key='$x'";
if($conn->query($sql)==true){
	echo "<script type='text/javascript'>alert('well done');
		 </script>";
}
else{
	echo "<script type='text/javascript'>alert('ERROR FETCHING DATA , TRY AGAIN');
           window.location='blacklist.php';
		 </script>";
	 $conn->close();  
	 exit();
   }	
	
$conn->close();

?>