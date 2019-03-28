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

<html lang="en">
  <head>
	  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RVCE VISITOR MANAGEMENT SYSTEM">
    <meta name="author" content="Kunal Bhandari and Nagashreays SP">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	  
    <title>Visitor Form</title>

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
		
		.container {
  max-width: 960px;
}

.lh-condensed { line-height: 1.25; }
		
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body>
	

	
   <marquee direction="scroll" style="position: absolute;top:-1px;">WELCOME TO RVCE VISITOR MANAGEMENT SYSTEM</marquee>
    <header class="headerWarp" role="banner">
        <div class="logo" style="padding-top:45px;margin-top:35px ; margin-left:15%;width=30%;font-family:sans-serif">
          <img src="rvlogo.jpg" alt="Home" width=120% height="150px">
        </div>
		
		<div class="written" style="padding-top:30px;margin-left:6%;margin-top: 50px;">
            <div class="rsst" style="padding-left:23%;color:goldenrod"><h4 style="font-size:20px">Rashtreeya Sikshana Samithi Trust</h4></div>
			<div class="rvce" style="color:crimson;padding-left:14%;padding-bottom:0%;margin-bottom: 0%"><h2 style="padding-bottom:0%;margin-bottom:0%;font-size:35px">RV College Of Engineering<sup>&#174</sup></h2></div>

            <div class="vtu" style="margin-top:0%;padding-top:0%;font-family:cursive"><h5 style="margin-top:0%;padding-top:2px;padding-bottom:0%;margin-bottom:0%;font-size:15px"><strong>Autonomous Institution affiliated to Visvesvaraya Technological University, Belagavi</strong></h5><h5 style="margin-top:0%;padding-left:10%;padding-top:1px;font-size:15px"><strong>Approved By AICTE, New Delhi, Accredited By NBA, New Delhi</strong></h5></div>
		</div>
		
		<div class="since" style="margin-top:50px;margin-left:3%;padding-top:80px;font-family:arial;color: blue">Since 1963</div>
           
        <div class="logo2" style="padding-top:20px;margin-left:3%;margin-top: 60px">
            <img src="https://rvce.edu.in/sites/all/themes/tb_rave/images/anniversary-logo.jpg" alt="NOT FOUND" width=120%>
        </div>
		
	  </header>
	  
	  <?php
    include('connection.php');
    $x = $_SESSION['logged_key'];
	$sql = "select security_username from security where security_id='$x'";
	$result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
	 $name = $row['security_username'];
	}
	echo '<p id="secname" style="position: absolute;left: 550px;top: 230px;color:red;font-size:25px;">Security Logged in as -->'.$name.'</p>';
?>
	  
	  
    <div class="container" style="position: absolute;left:260px;top: 300px">
    <h2 style="color: gray;margin-left:200px">VISITOR FORM</h2>
		<br>
      <form method="post" action="visinsert.php">
        <div class="row">
          <div class="col-md-4 mb-2">
            
			  <label for="visitor_name"><strong>Visitor Name</strong></label>
			  <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="visitor_name" name="visitor_name" placeholder="Rahul" required>
            </div>
          </div>
			
          <div class="col-md-4 mb-2">
            <label for="visitee_name"><strong>Visitee Name</strong></label>
			   <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="visitee_name" name="vis_name" placeholder="Surya" required>
          </div>
			</div>
        </div>
		  <br>
		 
		
		  <h5 class="mb-3">Visitor Gender</h5>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="male" name="gender" type="radio" value="male" class="custom-control-input" checked>
            <label class="custom-control-label" for="male">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="female" name="gender" value="female" type="radio" class="custom-control-input">
            <label class="custom-control-label" for="female">Female</label>
          </div>
        </div>
		  
		  <div class="row">
        <div class="col-md-4 mb-2">
          <label for="visitor_contact"><strong>Visitor Contact</strong></label>
            <input type="text" class="form-control" name="contact" id="visitor_contact" placeholder="8951721798" required>
        </div>
			  <div class="col-md-4 mb-3">
            <label for="visitor_desg"><strong>Visitee Designation</strong></label>
            <select class="custom-select d-block w-100" id="visitor_desg" name="desg" required>
				<option selected="selected">student</option>		
			  <option>hod</option>
			  <option>staff</option>
			  <option>administration</option>
			  <option>principal</option>
			  <option>warden</option>
			  <option>others</option>
            </select>
          </div>
			</div>
		  
		     <div class="row">
        <div class="col-md-4 mb-2">
          <label for="visitor_age"><strong>Visitor Age</strong></label>
            <input type="text" class="form-control" name="age" id="visitor_age" placeholder="18" required>
        </div>
				 
				 <div class="col-md-4 mb-3">
            <label for="visitor_dept"><strong>Visitee Department</strong></label>
            <select class="custom-select d-block w-100" id="visitor_dept" name="dept" required>
				<option selected="selected">ISE</option>
				<option>ASE</option>
             <option>BTE</option>
             <option>CHE</option> 
             <option>CVE</option>
             <option>CSE</option>
             <option>ECE</option>
             <option>EEE</option> 
             <option>IEM</option>
             <option>MCA</option> 
             <option>ME</option>
             <option>TCE</option>
			 <option>EIE</option>
             <option>BASIC SCIENCES</option>
             <option>ADMINISTRATION</option> 
             <option>HOSTEL</option>
			 <option>MISCELLANEOUS</option>
            </select>
          </div>
		  </div>
		  
		    <div class="row">
        <div class="col-md-4 mb-2">
          <label for="visitor_id"><strong>Visitor ID</strong></label>
            <input type="text" class="form-control" id="visitor_id" name="ide" placeholder="VALID GOVT ID" required>
        </div>
			</div>
		  
        <div class="row">
        <div class="col-md-6 mb-3">
          <label for="visitor_email"><strong>Visitor_Email</strong></label>
            <input type="text" class="form-control" name="email" id="visitor_email" placeholder="visitor_email@gmail.com">
        </div>
			</div>

		  
		  <div class="mb-2">
          <label for="visit_purpose"><strong>Visit Purpose</strong></label>
            <input type="text" class="form-control" name="purpose" id="visit_purpose" placeholder="PTM,Attendance,Private,Hostel" required>
        </div>
		  
        <hr class="mb-4">
		  
        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
      </form>
		<hr>
		
		<div class="row">
			
        <div class="col-md-3" style="margin-left: 150px;">
         <input class="btn btn-lg btn-primary" onclick="off()" type="button" value="Check_Off" style="background-color:green">
        </div>
			<div class="col-md-3">
         <input class="btn btn-lg btn-primary" onclick="logout()" type="button" value="Logout" style="background-color:orange">
        </div>
			<div class="col-md-3">
         <input class="btn btn-lg btn-primary" onclick="blacklist()" type="button" value="Blacklist" style="background-color:black">
        </div>
			</div>
		
		<p class="mt-5 mb-3 text-muted" style="padding-left:300px;">&copy;RVCE VISITOR MANAGEMENT</p>
		
    </div>
  <script type="text/javascript">
function logout(){
			var na = document.getElementById("secname").textContent;
	       
                     $.ajax({
                      url:"securelogout.php",
                      type:"POST",
                      data:{ 'xy': na },
					 success:function()
                        {
                            alert("logged out.!");                                 
                        }
					  });
			window.location = "home.html";
		}
	  
            function off(){
				window.location="check_off.php";
			}
			
			function blacklist(){
                window.location="blacklist.php"
			}
</script>
	  
	</body>
	
</html>
