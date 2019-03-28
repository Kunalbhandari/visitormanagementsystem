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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
    <title>VISITOR MANAGEMENT SYSYTEM</title>
    <style type="text/css">
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
		
		.sec {
	 border-top:transparent;
	 border-left:transparent;
   	 border-right:transparent;
	 border-bottom-color:red;
	 box-shadow:dark;
	 width:200px;
	 height:35px;
		}
				.sec:focus{
			border-bottom-color:violet;
		}
		
		.metoo{
		   font-size:20px;
           color:orange;
		}
		
		.se{
	        width:200px;
			border-radius: 40%;
			border: transparent;
			@shadow: rgba(0, 0, 0, .1);
           @shadow-length: 4px;
           box-shadow: 0 @shadow-length 0 0 @shadow;
        text-shadow: 0 @shadow-length 0 @shadow;
        background-color:orange;
       color:aqua;
        font-family: "josefin sans", Arial Black, sans;
       font-size: 20px;
       text-align: center;
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
		
</style>
</head>    

<body>
	
<?php
    include('connection.php');
    $x = $_SESSION['ad_logged_key'];
	$sql = "select admin_username from admin where admin_id='$x'";
	$result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
	 $name = $row['admin_username'];
	}
	echo '<p id="adname" style="position: absolute;left: 550px;top: 200px;color:red;font-size:20px;">Admin Logged in as--> '.$name.'</p>';
?>
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
	
<div style="position: absolute;left:200px;top:300px;width: 500px;">
 
	<span style="color: purple;font-size:25px;width:350px;position: absolute;left: 325px;top: -50px">REMOVE BLACKLISTERS</span>
	<br/>
 <table id='customers' style="position:absolute;left:-40px;">
	<tr>
	   <th>visitor_key</th>
		<th>visitor_id</th>
		<th>visitor_name</th>
		<th>visitor_contact</th>
		<th>visitee_id</th>
		<th>visitee_name</th>
		<th>visitee_contact</th>
		<th>purpose_of_meeting</th>
		<th>remove_blacklister</th>
	</tr>
 </table>	
	
	<input type="button" value="LOGOUT" style="position:absolute;color:white;background-color: green;left:700px;top:-50px;width:100px;height:30px;border: transparent;border-top-left-radius: 10px;border-bottom-right-radius: 10px;" onclick="back()">
	
	<input type="button" value="GENERATE_GRAPHS" style="position:absolute;color:white;background-color: green;left:80px;top:-50px;width:180px;height:30px;border: transparent;border-top-left-radius: 10px;border-bottom-right-radius: 10px;" onclick="graph()">
	
</div>	
	
	<?php

include('connection.php');

$sql = "select * from defaulters";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
 if(!($row['defaulter_key'])){
	   echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='admin.html';
		 </script>";
	 $conn->close();  
	 exit();
	}
else{
$visitor_key = $row['defaulter_key'];
$visitor_id = $row['id'];
$visitor_contact = $row['contact'];
$visitor_name = $row['name'];
	
$sql1 = "select visitee_id_fk,purpose_of_visit from visits where visitor_key_fk='$visitor_key'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
 if(!($row1['visitee_id_fk'])){
	 echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='admin.html';
		 </script>";
	 $conn->close();  
	 exit();
 }
$visitee_id = $row1['visitee_id_fk'];
$purpose = $row1['purpose_of_visit'];
	
$sql1 = "select visitee_name,visitee_contact from visitee where visitee_id='$visitee_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
 if(!($row1['visitee_name']||$row1['visitee_contact'])){
	 echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='admin.html';
		 </script>";
	 $conn->close();  
	 exit();
 }
$visitee_name = $row1['visitee_name'];
$visitee_contact = $row1['visitee_contact'];
	
	echo "<script type='text/javascript'>
                  var tab = document.getElementById('customers');
	              var row = tab.insertRow(tab.rows.length);
	              row.setAttribute('id','$visitor_key');
				  row.insertCell(0).innerHTML = '$visitor_key';
				  row.insertCell(1).innerHTML = '$visitor_id';
				  row.insertCell(2).innerHTML = '$visitor_name';
				  row.insertCell(3).innerHTML = '$visitor_contact';
				  row.insertCell(4).innerHTML = '$visitee_id';
				  row.insertCell(5).innerHTML = '$visitee_name';
				  row.insertCell(6).innerHTML = '$visitee_contact';
                  row.insertCell(7).innerHTML = '$purpose';
				  var butt = row.insertCell(8);
	              var button = document.createElement('input');
	              butt.appendChild(button);
	              button.setAttribute('type','button');
	              button.setAttribute('name','remove');
	              button.setAttribute('value','REMOVE_BLACKLIST');
	              button.setAttribute('onclick','remove(this)');
	              button.setAttribute('style','background-color:green;color:white;border:transparent;border-top-left-radius:5px;border-bottom-right-radius:5px;');
				  
	  </script>";	
  }	
}
	
$conn->close(); 	
	
?>	
	
	
	<script type="text/javascript">
		
		          function back(){
					 var na = document.getElementById("adname").textContent;
                     $.ajax({
                      url:"securelogoutadmin.php",
                      type:"POST",
                      data:{ 'xy': na },
					 success:function()
                        {
                            alert("logged out.!");                                 
                        }
					  });
			window.location = "admin.html";
				 }
		
		 function remove(pho){
				      var x = pho.parentNode.parentNode.firstChild.innerHTML;
					  var empTab = document.getElementById('customers');
					  $.ajax({
                      url:"dbremove.php",
                      type:"POST",
                      data:{ 'xy': x },
					 success:function()
                        {
                            alert("blaclister removed.!");                                 
                        }
					  });
		 			  empTab.deleteRow(pho.parentNode.parentNode.rowIndex);
				  }
		
		function graph(){
             window.location = "graph.php";
		}
		
	</script>
	
</body>        
	
</html>