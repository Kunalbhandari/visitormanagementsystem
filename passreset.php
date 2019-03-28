<?php
$email=$_GET['key'];
?>

<html lang="en">
	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Password Reset</title>
	  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
	<link href="signin.css" rel="stylesheet">
    <style>
		   .logo,.written,.since,.logo2{
           float:left;
        }
        
marquee{
			width: 100%;
        padding: 10px 0;
        background-color:darkmagenta;
		color:darkorange;
		font-size: 25px;
		font-family: sans-serif;
		}
        
    </style>
	
	</head>

  <body>
	  <marquee direction="scroll">WELCOME TO RVCE VISITOR MANAGEMENT SYSTEM</marquee>
    <header class="headerWarp" role="banner">
        <div class="logo" style="padding-top:20px;margin-left:15%;width=30%;font-family:sans-serif">
          <img src="rvlogo.jpg" alt="Home" width=120% height="150px">
        </div>
		
		<div class="written" style="padding-top:10px;margin-left:6%">
            <div class="rsst" style="padding-left:25%;font-size:100%;color:goldenrod"><h4>Rashtreeya Sikshana Samithi Trust</h4></div>
			<div class="rvce" style="color:crimson;padding-left:18%;padding-bottom:0%;margin-bottom: 0%"><h2 style="padding-bottom:0%;margin-bottom:0%">RV College Of Engineering<sup>&#174</sup></h2></div>

            <div class="vtu" style="margin-top:0%;padding-top:0%;font-family:cursive"><h5 style="margin-top:0%;padding-top:2px;padding-bottom:0%;margin-bottom:0%;"><strong>Autonomous Institution affiliated to Visvesvaraya Technological University, Belagavi</strong></h5><h5 style="margin-top:0%;padding-left:10%;padding-top:1px;"><strong>Approved By AICTE, New Delhi, Accredited By NBA, New Delhi</strong></h5></div>
		</div>
		
		<div class="since" style="margin-left:3%;padding-top:80px;font-family:arial;color: blue">Since 1963</div>
           
        <div class="logo2" style="padding-top:20px;margin-left:3%">
            <img src="https://rvce.edu.in/sites/all/themes/tb_rave/images/anniversary-logo.jpg" alt="NOT FOUND" width=120%>
        </div>
		
	  </header>
	  
    <form class="form-signin" action="resetpassdb.php" method="post" style="position: absolute;top: 220px;left:530px;">
  
  <p class="h3 mb-3 font-weight-normal" style="padding-left:60px;color: grey">Reset Password.!</p>
		
  <input type="hidden" name="email" value="<?php echo $email ?>">
		
  <p style='width: 10px;height: 25px;margin: 0px;padding: 0px;color: green' id='userna'></p>		
  <label for="passcode" class="sr-only">Password</label>
  <input type="password" name="pass" id="passcode" class="form-control" onmouseover="myy()"  placeholder="password" onmouseout="m()" required>
	
  <label for="inputPassword" class="sr-only">Confirm Password</label>
  <input type="password" name="copass" id="inputPassword" class="form-control" onmouseover="my()" onmouseout="ma()" placeholder="Confirm Password" required>
  <p style='width: 200px;height: 25px;margin: 0px;padding: 0px;color:gold' id='user'></p>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">password reset</button>
		<br/>
  <p class="mt-5 mb-3 text-muted" style="padding-left:40px;">&copy; RVCE VISITOR MANAGEMENT</p>
</form>
		 
	  
	  <script type="text/javascript">
	  
		function myy(){
				var x =document.getElementById("userna");
		        x.textContent = 'Password';
			    
		}
		  
		 function m(){
             var x =document.getElementById("userna");
		        x.textContent = '';
		 } 
		  
		 function my(){
				var x =document.getElementById("user");
		        x.textContent = 'Confirm Password';
			    
		}
		  
		 function ma(){
             var x =document.getElementById("user");
		        x.textContent = '';
		 }  
	  </script>
</body>
  </html> 