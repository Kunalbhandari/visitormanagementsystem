<?php

include('connection.php');


$sql = "select id,name from defaulters";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if($row['id']==$ide){
	   echo "<script type='text/javascript'>alert('DEFAULTER!');
           window.location='securityhome.php';
		 </script>";
	 $conn->close();
	 exit();
	}

$sql = "select cur_visitor_id from current_visitors";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
     if($row['cur_visitor_id']==$ide){
		 echo "<script type='text/javascript'>alert('visitor_id already in current use!');
           window.location='securityhome.php';
		 </script>";
		 $conn->close();  
		 exit();
	 }	
}

$sql = "select visitee_id from visitee where visitee_name = '$vis' and visitee_department='$dept' and visitee_designation = '$des'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if(!($row['visitee_id'])){
	   echo "<script type='text/javascript'>alert('NO SUCH database found');
           window.location='securityhome.php';
		 </script>";
	 $conn->close();
	 exit();
	}
$v2_id=$row['visitee_id'];
  
    session_start();
    $x=$_SESSION['logged_key'];
	$sql = "select security_username from security where security_id='$x'";
	$result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
	 $sec_name = $row['security_username'];
	}

$date = getdate();
$da = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
$ti = $date['hours'].':'.$date['minutes'].':'.$date['seconds'];

$sql = "insert into visitors (visitor_id,visitor_name,visitor_gender,visitor_age,visitor_contact,visitor_email,check_in_date,check_in_time,security_id_fk,security_name,check_out_date,check_out_time) values('$ide','$name','$gender','$age','$contact','$email','$da','$ti','$x','$sec_name',null,null)";
if($conn->query($sql)==true){
   //	echo "<script type='text/javascript'>alert('ENETERED INTO DATABASE');
	//	</script>";
}
else{
	echo "<script type='text/javascript'>alert('NOT ENTERED , ENTER AGAIN');
           window.location='securityhome.php';
		 </script>";
	exit();
}

$sql = "select visitor_key from visitors order by visitor_key desc limit 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if(!($row['visitor_key'])){
	   echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='securityhome.php';
		 </script>";
	 $conn->close();  
	 exit();
	}
$v1_id = $row['visitor_key'];

$sql = "insert into current_visitors values('$v1_id','$ide','$name','$contact')";
if($conn->query($sql)==true){
   	//echo "<script type='text/javascript'>alert('ENETERED INTO DATABASE');
		// </script>";
}
else{
	echo "<script type='text/javascript'>alert('NOT ENTERED , ENTER AGAIN');
           window.location='securityhome.php';
		 </script>";
	$conn->close();  
	exit();
}


$sql = "insert into visits values('$v1_id','$v2_id','$purpose')";
if($conn->query($sql)==true){
   	echo "<script type='text/javascript'>alert('ENETERED INTO DATABASE');
		 </script>";
}
else{
	echo "<script type='text/javascript'>alert('NOT ENTERED , ENTER AGAIN');
           window.location='securityhome.php';
		 </script>";
	$conn->close();  
	exit();
}

$conn->close(); 

echo "<script type='text/javascript'>
           window.location='image.php';
		 </script>";

?>