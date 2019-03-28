<?php

$emailerr="";
$email="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
if (empty($_POST["email"])) {
    $emailerr = "Email is required";
    echo "<script type='text/javascript'>alert('$emailerr');
		 window.location='pass.html';
		 </script>";
	     exit();
        }
	
   else {
    $email = test($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format"; 
         echo "<script type='text/javascript'>alert('$emailerr');
		 window.location='pass.html';
		 </script>";
		  exit();
        }
    }
}
else{
    echo "<script type='text/javascript'>alert('securityissues , login form(post)');
		 window.location='pass.html';
		 </script>";
	     exit();
}

function test($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

include('connection.php');

$sql = "select security_name,security_email from security where security_email='$email'";
$result = $conn->query($sql);

if(!($result->num_rows==1||row['security_email'])){
      echo "<script type='text/javascript'>alert('email not found in records , sign up.!');
		 window.location='pass.html';
		 </script>";
	     exit();
}
else{
  $row = $result->fetch_assoc();
  $email = $row['security_email'];
  $name = $row['security_name'];
  $ss = md5($email);
  $sql = "update security set link='$ss' where security_email = '$email'";
  if($conn->query($sql)==false){
	    echo "<script type='text/javascript'>alert('database retrieval error , try again.!');
		 window.location='pass.html';
		 </script>";
	     exit();
  }
	$link="<a href='localhost/visitor/passreset.php?key=".$email."'>Click To Reset password</a>";
    require_once('PHPMailer_5.2.4/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;    
    // GMAIL username
    $mail->Username = "kunalbhandari15@gmail.com";
    // GMAIL password
    $mail->Password = "";
    $mail->SMTPSecure = "tls";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "587";
    $mail->From='kunalbhandari15@gmail.com';
    $mail->FromName='kunalbhandari';
    $mail->AddAddress($email,$name);
    $mail->Subject  =  'RVCE visitor management Security password reset form';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "<h1 style='position:absolute;left:300px;top:300px;'>Check Your Email and Click on the link sent to your email</h1>";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }	
}
$conn->close();

?>