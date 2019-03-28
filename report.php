<!DOCTYPE html>

<?php
session_start();

if(!(isset($_SESSION['ad_logged_in']))){
echo "<script type='text/javascript'>alert('Authenticate please!');
		 window.location='admin.html';
		 </script>";
	     exit();
}

if($_SESSION['ad_logged_in']=="unactive" && $_SESSION['ad_logged_key']=="lost"){
  echo "<script type='text/javascript'>alert('Authenticate please!');
		 window.location='admin.html';
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
        
		#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
			width: 25%;
}
		
		#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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
          <img src="https://rvce.edu.in/sites/default/files/logo_0.png" alt="Home" width=120%>
        </div>
		
		<div class="written" style="padding-top:10px;margin-left:6%">
            <div class="rsst" style="padding-left:25%;font-size:100%;color:goldenrod"><h4>Rashtreeya Sikshana Samithi Trust</h4></div>
			<div class="rvce" style="color:crimson;padding-left:18%;padding-bottom:0%;margin-bottom: 0%"><h2 style="padding-bottom:0%;margin-bottom:0%">R V College Of Engineering<sup>&#174</sup></h2></div>

            <div class="vtu" style="margin-top:0%;padding-top:0%;font-family:cursive"><h5 style="margin-top:0%;padding-top:2px;padding-bottom:0%;margin-bottom:0%;"><strong>Autonomous Institution affiliated to Visvesvaraya Technological University, Belagavi</strong></h5><h5 style="margin-top:0%;padding-left:10%;padding-top:1px;"><strong>Approved By AICTE, New Delhi, Accredited By NBA, New Delhi</strong></h5></div>
		</div>
		
		<div class="since" style="margin-left:3%;padding-top:80px;font-family:arial;color: blue">Since 1963</div>
           
        <div class="logo2" style="padding-top:20px;margin-left:3%">
            <img src="https://rvce.edu.in/sites/all/themes/tb_rave/images/anniversary-logo.jpg" alt="NOT FOUND" width=120%>
        </div>
		
	  </header>
    
    
  <h2 style="position:absolute;left:550px;top:230px;color:violet">QUERIES -- TABLE </h2>
	
  <input type="button" value="BACK" style="position:absolute;color:white;background-color: green;left:280px;top:250px;width:150px;height:30px;border: transparent;border-top-left-radius: 10px;border-bottom-right-radius: 10px;" onclick="back()">
	
<table id='customers' style="position:absolute;left:150px;top:300px;">
	<tr style="width: auto">
	   <th>visitor_key</th>
		<th>visitor_id</th>
		<th>visitor_name</th>
		<th>visitor_gender</th>
		<th>visitee_id</th>
		<th>visitee_name</th>
		<th>visitee_desg</th>
		<th>visitee_dept</th>
		<th>check_in_date</th>
		<th>check_out_date</th>
	</tr>
 </table>	

<?php

$gender = array();
$x=0;

foreach($_POST['gender'] as $ge){
	$gender[$x++]=$ge;
}
	
$gender = "('". implode("','", $gender) ."')";
	
$desig = array();
$x=0;

foreach($_POST['desg'] as $ge){
	$desig[$x++]=$ge;
}
$desig = "('". implode("','", $desig) ."')";
	
$dept = array();
$x=0;

foreach($_POST['dept'] as $ge){
	$dept[$x++]=$ge;
}
$dept = "('". implode("','", $dept) ."')";

$start = $_POST['start'];
$end = $_POST['end'];
	
include('connection.php');

$sql = "select visitor_key,visitor_id,visitor_name,visitor_gender,check_in_date,check_out_date,visitee_id,visitee_name,visitee_designation,visitee_department from visitors,visits,visitee where visitors.visitor_key=visits.visitor_key_fk and visits.visitee_id_fk=visitee.visitee_id and visitors.check_in_date between '$start' and '$end' and visitors.visitor_gender in $gender and visitee_designation in $desig and visitee_department in $dept";
	
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$visitor_key = $row['visitor_key'];
	$visitor_id = $row['visitor_id'];
	$visitor_name = $row['visitor_name'];
	$visitor_gender = $row['visitor_gender'];
	$visitor_start = $row['check_in_date'];
	$visitor_end = $row['check_out_date'];
	$visit_id = $row['visitee_id'];
	$visit_name = $row['visitee_name'];
	$visit_desg = $row['visitee_designation'];
	$visit_dept = $row['visitee_department'];
	
	echo "<script type='text/javascript'>
	     var tab = document.getElementById('customers');
	              var row = tab.insertRow(tab.rows.length);
	              row.setAttribute('id','$visitor_key');
				  row.insertCell(0).innerHTML = '$visitor_key';
				  row.insertCell(1).innerHTML = '$visitor_id';
				  row.insertCell(2).innerHTML = '$visitor_name';
				  row.insertCell(3).innerHTML = '$visitor_gender';
				  row.insertCell(4).innerHTML = '$visit_id';
				  row.insertCell(5).innerHTML = '$visit_name';
				  row.insertCell(6).innerHTML = '$visit_desg';
				  row.insertCell(7).innerHTML = '$visit_dept';
				  row.insertCell(8).innerHTML = '$visitor_start';
				  row.insertCell(9).innerHTML = '$visitor_end';
		 </script>";
}
	
$conn->close();	
	
?>
	
<script type="text/javascript">

  function back(){
     window.location = 'graph.php';
  }

</script>

		
</body>        
</html>