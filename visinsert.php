<?php

$namerr=$emailerr=$viserr=$conerr=$agerr=$iderr=$desgerr=$idterr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['visitor_name'])){
	   $namerr="visitor_name is required";
	   echo "<script type='text/javascript'>alert('$namerr');
		 window.location='securityhome.php';
		 </script>";
	     exit();
 }
   else{
	   $name=test($_POST['visitor_name']);
	   if(!preg_match("/^[a-zA-Z]+$/",$name)){
         $namerr="Invalid Visitor name format";
		 echo "<script type='text/javascript'>alert('$namerr');
		 window.location='securityhome.php';
		 </script>";
		   exit();
	   }
   }
    
    if(empty($_POST['vis_name'])){
	   $viserr="visitor_name is required";
	   echo "<script type='text/javascript'>alert('$viserr');
		 window.location='securityhome.php';
		 </script>";
		exit();
 }
   else{
	   $vis=test($_POST['vis_name']);
	   if(!preg_match("/^[a-zA-Z]+$/",$vis)){
         $viserr="Invalid Visitee name format";
		 echo "<script type='text/javascript'>alert('$viserr');
		 window.location='securityhome.php';
		 </script>";
		   exit();
	   }
   }
    
     if(empty($_POST['contact'])){
	   $conerr="contact no is required";
	   echo "<script type='text/javascript'>alert('$conerr');
		 window.location='securityhome.php';
		 </script>";
		 exit();
 }
   else{
	   $contact=test($_POST['contact']);
	   if(!preg_match("/^[0-9]{10}$/",$contact)){
         $conerr=" Invalid contact format";
		 echo "<script type='text/javascript'>alert('$conerr');
		 window.location='securityhome.php';
		 </script>";
		   exit();
	   }
   }
    
 if (empty($_POST["email"])) {
    $emailerr = "Email is required";
   // echo "<script type='text/javascript'>alert('$emailerr');
	//	 window.location='securityhome.php';
		// </script>";
	    // exit();
        }
	
   else {
    $email = test($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format"; 
         echo "<script type='text/javascript'>alert('$emailerr');
		 window.location='securityhome.php';
		 </script>";
		  exit();
        }
    }
    
    
    if(!empty($_POST["dept"])){
	   $dept=test($_POST["dept"]);
    }
	   
    
 if(empty($_POST['age'])){
	   $agerr="Age is required";
	   echo "<script type='text/javascript'>alert('$agerr');
		 window.location='securityhome.php';
		 </script>";
	  exit();
 }
   else{
	   $age=test($_POST['age']);
	   if(!preg_match("/^[0-9]{1,2}$/",$age)){
         $ageerr=" Invalid age";
		 echo "<script type='text/javascript'>alert('$ageerr');
		 window.location='securityhome.php';
		 </script>";
		   exit();
	   }
   }
                  
                  
     if(empty($_POST['desg'])){
	   $desgerr="Designation is required";
	   echo "<script type='text/javascript'>alert('$desgerr');
		 window.location='securityhome.php';
		 </script>";
		 exit();
 }
   else{
	   $des=test($_POST['desg']);
	   if(!preg_match("/^[a-zA-Z]+$/",$des)){
         $desgerr="Invalid Desgination name ";
		 echo "<script type='text/javascript'>alert('$desgerr');
		 window.location='securityhome.php';
		 </script>";
		   exit();
	   }
   }
     
	
 if(empty($_POST['ide'])){
	   $iderr="Id no is required";
	   echo "<script type='text/javascript'>alert('$iderr');
		 window.location='securityhome.php';
		 </script>";
	 exit();
 }
   else{
	   $ide=test($_POST['ide']);
	   /*if(!preg_match("/^[0-9]{12}$/",$ide)){
         $iderr=" Invalid Id format";
		 echo "<script type='text/javascript'>alert('$iderr');
		 window.location='securityhome.php';
		 </script>";
	     exit();  
	   }*/
   }
	
	 if(empty($_POST['purpose'])){
	   $purerr="purpose is required";
	   echo "<script type='text/javascript'>alert('$purerr');
		 window.location='securityhome.php';
		 </script>";
		 exit();
 }
   else{
	   $purpose=test($_POST['purpose']);
	   if(!preg_match("/^[a-zA-Z0-9 ]{1,50}$/",$purpose)){
         $purerr=" Invalid purpose format (should be 50 characters or less.)";
		 echo "<script type='text/javascript'>alert('$purerr');
		 window.location='securityhome.php';
		 </script>";
		   exit();
	   }
   }
	
 $gender = test($_POST['gender']);
 $dept = test($_POST['dept']);
}

function test($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  echo "<br>";
  return $data;
}

include('storedb.php');
 
?>