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
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	
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
	

/* Style the sidenav links and the dropdown button */
.dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.dropdown-btn:hover {
  color: #f1f1f1;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
	
		
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
		
	
.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 15px;
  cursor:pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
position: absolute;
	top: 0px;
 height: 55px;
	width: 110px;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  position: absolute;
  left: 0px;
  top: 0px;
padding-top:8px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
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
    
    
	<p style="color: violet;position: absolute;left:550px;top:210px;font-size:25px;">overall graph statistics</p>
	<div id="chart_div" style="position: absolute;left: 200px;top: 250px;"></div>
	<div id="chart_divs" style="position: absolute;left: 500px;top: 250px;"></div>
    <div id="chart_divd" style="position: absolute;left: 820px;top: 250px;"></div>
	
	<div id="main">
  <button class="openbtn" onclick="openNav()">&lt;-- Reports</button> 
   </div>
	
     <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">--&gt;</a>
       <button class="dropdown-btn">REPORTS BY DATE
       <i class="fa fa-caret-down"></i>
       </button>
       <div class="dropdown-container">
		 <form method="post" action="report.php"> 
		<label style="color: orange;font-family: cursive;font-size:20px;"><input id='startdate' type='date' name="start" min='2019-02-01' value='2019-02-01'/> start-date</label><br/>
			 <br/>
		<label style="color: orange;font-family: cursive;font-size:20px;"><input id='startdate' type='date' name="end" min='2019-02-01' value='2019-05-31'/> end-date</label>
	    <br/>
	 <br/>
	<div style='font-size:20px;color:red'>Gender</div><select type="text" name="gender[]" style="font-size:18px;width:150px;height:50px;color: purple;" value='male' multiple>
			 <option selected="selected">male</option>
            <option selected="selected">female</option>
			 </select>
		<br/>	 
		<br/>	 
				
		<div style="font-size:20px;color:red">Visitee_Designation<select type="text" name="desg[]" style="color:red;font-size:18px;width:190px;color:purple" value='student' multiple>
		      <option selected="selected">student</option>		
			  <option selected="selected">hod</option>
			  <option selected="selected">staff</option>
			  <option selected="selected">administration</option>
			  <option selected="selected">principal</option>
			  <option selected="selected">warden</option>
			  <option selected="selected">others</option>
			</select>
			</div>
		<br/>	 
			 
		<div style="color:red;font-size:20px">Visitee_department<select name="dept[]" style="font-size:18px;width:220px;height:200px;;color: purple" value="ISE" multiple>
            <option selected='selected'>ISE</option>
			 <option selected="selected">ASE</option>
             <option selected="selected">BTE</option>
             <option selected="selected">CHE</option> 
             <option selected="selected">CVE</option>
             <option selected="selected">CSE</option>
             <option selected="selected">ECE</option>
             <option selected="selected">EEE</option> 
             <option selected="selected">IEM</option>
             <option selected="selected">MCA</option> 
             <option selected="selected">ME</option>
             <option selected="selected">TCE</option>
			 <option selected="selected">EIE</option>
             <option selected="selected">BASIC SCIENCES</option>
             <option selected="selected">ADMINISTRATION</option> 
             <option selected="selected">HOSTEL</option>
			 <option selected="selected">MISCELLANEOUS</option>
			</select></div>
			 
			 <input type="submit" value="generate_reports" style="border: transparent;color:white;background-color:green;position:absolute;left:40px"/>
			 
         </form> 
		   
		 </div>
		 
		 </div>
	
	    <input type="button" value="BACK" style="position:absolute;color:white;background-color: green;left:580px;top:530px;width:150px;height:30px;border: transparent;border-top-left-radius: 10px;border-bottom-right-radius: 10px;" onclick="back()">
	
	<?php
      include('connection.php');
$male=$female=0;
$sql = "select count(visitor_gender) from visitors where visitor_gender='male'";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()){
         $male = $row['count(visitor_gender)'];
      }
      else{
           echo "<script type='text/javascript'>alert('cannot fetch database , tyr again');
           window.location='adminhome.php';
	      </script>";
          exit();
      }
      $sql = "select count(visitor_gender) from visitors where visitor_gender='female'";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()){
      $female = $row['count(visitor_gender)'];
     }
     else{
         echo "<script type='text/javascript'>alert('cannot fetch database , tyr again');
           window.location='adminhome.php';
	      </script>";
          exit();
     }

  $sql = "select visitee_designation,count(visitee_designation) from visitee,visits where visits.visitee_id_fk=visitee.visitee_id group by visitee_designation";
  $result = $conn->query($sql);
  $staff=$student=$others=$principal=$administration=$hod=$warden=0;
  while($row = $result->fetch_assoc()){
         if($row['visitee_designation']=='hod'){
            $hod = $row['count(visitee_designation)'];
         }
         else if($row['visitee_designation']=='others'){
            $others = $row['count(visitee_designation)'];
         }
         else if($row['visitee_designation']=='principal'){
            $principal = $row['count(visitee_designation)'];
         }
         else if($row['visitee_designation']=='staff'){
            $staff = $row['count(visitee_designation)'];
         }
         else if($row['visitee_designation']=='student'){
            $student = $row['count(visitee_designation)'];
         }
         else if($row['visitee_designation']=='administration'){
            $administration = $row['count(visitee_designation)'];
         }
         else{
            $warden = $row['count(visitee_designation)']; 
         }
      }

   $sql = "select visitee_department,count(visitee_department) from visitee,visits where visits.visitee_id_fk=visitee.visitee_id group by visitee_department";
   $result = $conn->query($sql);
  $ise=$ase=$mech=$cse=$tce=$ece=$eee=$civil=$iem=$eie=$admin=$basicsci=$hostel=$miscel=$bt=$ch=$mca=0;
  while($row = $result->fetch_assoc()){
     if($row['visitee_department']=='ISE'){
            $ise = $row['count(visitee_department)'];
         }
     else if($row['visitee_department']=='ASE'){
            $ase = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='CSE'){
            $cse = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='EEE'){
            $eee = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='ECE'){
            $ece = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='BTE'){
            $bt = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='TCE'){
            $tce = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='CVE'){
            $civil = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='IEM'){
            $iem = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='ADMINISTRATION'){
            $admin = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='BASIC SCIENCES'){
            $basicsci = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='HOSTEL'){
            $hostel = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='EIE'){
            $eie = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='ME'){
            $mech = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='MCA'){
            $mca = $row['count(visitee_department)'];
         }
else if($row['visitee_department']=='CHE'){
            $ch = $row['count(visitee_department)'];
         }
else{
    $miscel = $row['count(visitee_department)'];
   }
}
      $conn->close();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

	
	var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
 for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
	
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}	
	
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	 
	function back(){
      window.location='adminhome.php';
	}
	
      function drawChart() {
        
	  var male = parseInt("<?php echo $male ?>");
	  var female = parseInt("<?php echo $female ?>");
		  
       var data = new google.visualization.DataTable();
        data.addColumn('string', 'gender');
        data.addColumn('number', 'visitors');
        data.addRows([
          ['MALE',male],
          ['FEMALE',female]
        ]);
		  
        var options = {'title':'VISITORS by gender',
                       'width':400,
                       'height':300};

        
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	
	google.charts.setOnLoadCallback(drawChartdesg);
      
	 function drawChartdesg() {
		 
	 var administration = parseInt("<?php echo $administration ?>");
	  var hod = parseInt("<?php echo $hod ?>");
	  var staff = parseInt("<?php echo $staff ?>");
	  var others = parseInt("<?php echo $others ?>");
	  var student = parseInt("<?php echo $student ?>");
	  var principal = parseInt("<?php echo $principal ?>");
	  var warden = parseInt("<?php echo $warden ?>");
	
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'designation');
        data.addColumn('number', 'visitors');
        data.addRows([
          ['STUDENT',student],
		  ['STAFF',staff],
			['WARDEN',warden],
			['ADMINISTRATION',administration],
			['HOD',hod],
			['PRINCIPAL',principal],
          ['OTHERS',others]
        ]);

        var options = {'title':'VISITORS visiting visitee by their designation',
                       'width':400,
                       'height':300};

        
        var chart = new google.visualization.PieChart(document.getElementById('chart_divs'));
        chart.draw(data, options);
      }
	
	google.charts.setOnLoadCallback(drawChartdept);
      
	 function drawChartdept() {
       
	      var ise = parseInt("<?php echo $ise ?>"); 
	      var cse = parseInt("<?php echo $cse ?>"); 
		  var tce = parseInt("<?php echo $tce ?>"); 
		  var eee = parseInt("<?php echo $eee ?>");
		  var ece = parseInt("<?php echo $ece ?>"); 
		  var eie = parseInt("<?php echo $eie ?>"); 
		  var mech = parseInt("<?php echo $mech ?>"); 
		  var che = parseInt("<?php echo $ch ?>"); 
		  var bt = parseInt("<?php echo $bt ?>");
		  var cve = parseInt("<?php echo $civil ?>"); 
		  var ase = parseInt("<?php echo $ase ?>"); 
		  var mca = parseInt("<?php echo $mca ?>"); 
		  var hostel = parseInt("<?php echo $hostel ?>");  
		  var admin = parseInt("<?php echo $admin ?>"); 
		  var miscel = parseInt("<?php echo $miscel ?>"); 
		  var basicsci = parseInt("<?php echo $basicsci ?>"); 
		  var iem = parseInt("<?php echo $iem ?>"); 
		 
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'departments');
        data.addColumn('number', 'visitors');
        data.addRows([
          ['ISE',ise],
		  ['CSE',cse],
			['TCE',tce],
			['EEE',eee],
			['EIE',eie],
			['ECE',ece],
			['CHE',che],
			['BTE',bt],
			['HOSTEL',hostel],
			['ADMIN',admin],
			['MISCELLANEOUS',miscel],
			['BASIC_SCIENCES',basicsci],
			['IEM',iem],
			['CIVIL',cve],
			['ASE',ase],
			['MCA',mca],
          ['MECH',mech]
        ]);

        var options = {'title':'VISITORS visiting visitee by their department',
                       'width':400,
                       'height':300};

        
        var chart = new google.visualization.PieChart(document.getElementById('chart_divd'));
        chart.draw(data, options);
      }
	  	
    </script>	
	
</body>        
</html>