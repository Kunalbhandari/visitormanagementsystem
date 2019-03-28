<?php
$namerr=$passerr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(empty($_POST['name'])){
	   $namerr="name is required";
	   echo "<script type='text/javascript'>alert('$namerr');
		 window.location='admin.html';
		 </script>";
  }

  else{
	   $name=test($_POST['name']);
	   if(!preg_match("/^[a-zA-Z0-9]*$/",$name)){
         $namerr="name not in format";
		 echo "<script type='text/javascript'>alert('$namerr');
		 window.location='admin.html';
		 </script>";
	   }
   }

   if(empty($_POST['pass'])){
	   $passerr="password is required";
	   echo "<script type='text/javascript'>alert('$passerr');
		 window.location='admin.html';
		 </script>";
   }
   else{
	   $pass=test($_POST['pass']);
   }
	 
 }
else{
	$mes = "login again for security reasons (post form)";
    echo "<script type='text/javascript'>alert('$mes');
		 window.location='admin.html';
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
  $sql = "SELECT admin_id,admin_username,admin_password from admin where admin_username='$name' AND admin_password='$pass'";
  $result = $conn->query($sql);
  while($row=$result->fetch_assoc()){
	if($row['admin_username']==$name && $row['admin_password']==$pass){
         echo "<script type='text/javascript'>alert('Connected and logged in successfully!');
		 </script>"; 
		session_start();
		$_SESSION['ad_logged_in']="veryactive";
		$_SESSION['ad_logged_key']=$row['admin_id'];
		$x=0;
		break;
	}
  }	   


if($x!==0){
	 echo "<script type='text/javascript'>alert('Wrong Username/Password!');
		 window.location='admin.html';
		 </script>";
	     exit();
}

echo "<script type='text/javascript'>window.location='adminhome.php';</script>";

$conn->close();
?>