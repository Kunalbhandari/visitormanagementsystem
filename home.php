<?php
$namerr=$passerr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(empty($_POST['name'])){
	   $namerr="name is required";
	   echo "<script type='text/javascript'>alert('$namerr');
		 window.location='home.html';
		 </script>";
  }

  else{
	   $name=test($_POST['name']);
	   if(!preg_match("/^[a-zA-Z0-9]*$/",$name)){
         $namerr="name not in format";
		 echo "<script type='text/javascript'>alert('$namerr');
		 window.location='home.html';
		 </script>";
	   }
   }

   if(empty($_POST['pass'])){
	   $passerr="password is required";
	   echo "<script type='text/javascript'>alert('$passerr');
		 window.location='home.html';
		 </script>";
   }
   else{
	   $pass=test($_POST['pass']);
   }
	 
 }
else{
	$mes = "login again for security reasons (post form)";
    echo "<script type='text/javascript'>alert('$mes');
		 window.location='home.html';
		 </script>";
}

function test($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

include('connection.php');

  //echo "Connected successfully<br>";
  $sql = "SELECT security_id,security_username,security_password from security where security_username='$name' AND security_password='$pass'";
  $result = $conn->query($sql);
  while($row=$result->fetch_assoc()){
	if($row['security_username']==$name && $row['security_password']==$pass){
         echo "<script type='text/javascript'>alert('Connected and logged in successfully!');
		 </script>"; 
		session_start();
		$_SESSION['logged_in']="active";
		$_SESSION['logged_key']=$row['security_id'];
		$x=0;
		break;
	}
  }

if($x!==0){
	 echo "<script type='text/javascript'>alert('Wrong Username/Password!');
		 window.location='home.html';
		 </script>";
	     exit();
}

echo "<script type='text/javascript'>window.location='securityhome.php';</script>";

$conn->close();
?>