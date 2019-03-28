<!DOCTYPE html>

<?php
session_start();

if(!(isset($_SESSION['logged_in']))){
echo "<script type='text/javascript'>alert('Authenticate please!');
		 window.location='home.html';
		 </script>";
	     exit();
}
if($_SESSION['logged_in']=="unactive" && $_SESSION['logged_key']=="0"){
  echo "<script type='text/javascript'>alert('Authenticate please!');
		 window.location='home.html';
		 </script>";
	     exit();
}

?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
    <title>VISITOR MANAGEMENT SYSYTEM</title>
    <style type="text/css">
        .logo,.written,.since,.logo2{
           float:left;
        }		
		
		marquee{
			width: 100%;
        padding: 10px 0;
        background-color:darkmagenta;
		color: darkorange;
		font-size: 25px;
		font-family: sans-serif;
		}
        
</style>
</head>    

<body>
    <marquee direction="scroll">WELCOME TO RVCE VISITOR MANAGEMENT SYSTEM</marquee>
    <header class="headerWarp" role="banner">
        <div class="logo" style="padding-top:20px;margin-left:15%;width=30%;font-family:sans-serif;position: absolute;left:0px">
          <img src="rvlogo.jpg" alt="Home" width=100% height="150px">
        </div>
		
		<div class="written" style="padding-top:10px;margin-left:6%;position: absolute;left:290px;top:70px">
            <div class="rsst" style="padding-left:25%;font-size:100%;color:goldenrod"><h4>Rashtreeya Sikshana Samithi Trust</h4></div>
			<div class="rvce" style="color:crimson;padding-left:18%;padding-bottom:0%;margin-bottom: 0%"><h2 style="padding-bottom:0%;margin-bottom:0%">RV College Of Engineering<sup>&#174</sup></h2></div>

            <div class="vtu" style="margin-top:0%;padding-top:0%;font-family:cursive"><h5 style="margin-top:0%;padding-top:2px;padding-bottom:0%;margin-bottom:0%;"><strong>Autonomous Institution affiliated to Visvesvaraya Technological University, Belagavi</strong></h5><h5 style="margin-top:0%;padding-left:10%;padding-top:1px;"><strong>Approved By AICTE, New Delhi, Accredited By NBA, New Delhi</strong></h5></div>
		</div>
		
		<div class="since" style="margin-left:3%;padding-top:80px;font-family:arial;color: blue;position: absolute;left:920px">Since 1963</div>
           		
	  </header>
	
	<?php
    include('passgenerationdb.php');
	?>
	
	<div class='pass-container' style="position: absolute;left:300px;top: 250px;width:700px;height:575px;">
		
	<div style="position: absolute;width:720px;height:90px;font-size: 25px;border: 2px solid red;border-top-left-radius:25px;border-bottom:transparent">
		<img src="rvlogo.jpg" width="60px" style="position: absolute;left: 20px;top:10px;">
		
		<p style="color:navy;position: absolute;top:40px; left: 130px;">RV College Of Engineering<sup>&#174</sup>, Bengaluru</p>
		
		<p style="position: absolute;left: 225px;top:10px;color: darkviolet">VISITOR PASS</p>	
	</div>
		
		<div class="img-data" style="position: absolute;width:720px;height:460px;border:2px solid orange;border-bottom-right-radius: 25px;top:85px;">
			
	<img src="<?php echo $visitor_image ?>" alt="couldn't retrieve, error 404" style="position: absolute;width: 250px;height: 240px;left: 50px;top: 40px;">
		
	<div style="position: absolute;left: 325px;top: 20px;width:390px;color:black;font-size:20px;">
		<span style="color: orange">
	visitor_name:<?php echo $visitor_name ?>	
	<br/>
	visitor_id:<?php echo $visitor_id ?>
	<br/>	
	visitor_key:<?php echo $visitor_key ?>
		<br/>	
	visitor_contact:<?php echo $visitor_contact ?>
		<br/>	
	visitor_email:<?php echo $visitor_email ?>
		<br/>	
	visitor_gender:<?php echo $visitor_gender ?>
			</span>
		<br/>	
		<br/>
		<span style="color: red">
	TO MEET
	<br/>	
	visitee_name: <?php echo $visitee_name ?>
   <br/>	
	visitee_id: <?php echo $visitee_id ?>
		<br/>	
	visitee_department: <?php echo $visitee_department ?>
		<br/>	
	visitee_designation: <?php echo $visitee_designation ?>
		</span>
		<br/>	<br/>
	<span style="position: absolute;left:-200px;top:380px;width:auto;color:crimson">VISITING_PURPOSE: <?php echo $purpose ?></span>
		
	</div>
			<button style="position: absolute;left: 120px;top: 310px;background-color: green;width: 80px;height: 25px;color: lavenderblush;border: transparent;border-bottom-left-radius:25px;border-bottom-right-radius:25px" onclick="mqw()">PRINT</button>
			
			<button style="position: absolute;left: 120px;top: 350px;background-color: green;width: 80px;height: 25px;color: lavenderblush;border: transparent;border-top-left-radius: 25px;border-bottom-right-radius: 25px" onclick="my()">DONE</button>
		</div>
	</div>
	
	
	<script type="text/javascript">
	
		function mqw(){
			window.print();
		}
		
		function my(){
			alert('redirecting to form page');
			window.location='securityhome.php';
		}
		
	</script>
	</body>
</html>