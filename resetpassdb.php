 <?php
     
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $copass = $_POST['copass'];
 

     if($pass!=$copass){
		 echo "<script type='text/javascript'>alert('password and confirm passwords do not match , try again .!');
		 window.location = 'passreset.php';
		 </script>";
         exit();
	 }
     
     $ss = md5($email);
    
    include('connection.php');
   
    $sql = "select security_email from security where link='$ss'";
    $result = $conn->query($sql);

if($result->num_rows==0){
       echo "<script type='text/javascript'>alert('key expired.');
	      window.location='home.html';
		 </script>";
	     exit();
     }

    if(!($result->num_rows==1)){
       echo "<script type='text/javascript'>alert('emailkey do not match , try again .!');
		 </script>";
	     exit();
     }
      

   $row = $result->fetch_assoc();
   if(!($row['security_email']==$email)){
	   echo "<script type='text/javascript'>alert('email do not match , try again.!');
		 </script>";
	     exit();
   }
	
    $sql = "update security set security_password='$pass' where security_email='$email'";
	if($conn->query($sql)==false){
		echo "<script type='text/javascript'>alert('database could not be updated , try again.!');
		 </script>";
	     exit();
	}
	else{
		 $l = 'NULL';
		   $sql = "update security set link='$l' where link='$ss'";
		  if($conn->query($sql)==false){
		  echo "<script type='text/javascript'>alert('password updated but session persists , update again.!');
		 </script>";
	     exit();
	        }
        	echo "<script type='text/javascript'>alert('password updated.!');
			window.location='home.html';
		   </script>";
	     exit();  
	}

?>