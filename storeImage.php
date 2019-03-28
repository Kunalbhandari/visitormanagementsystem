<?php
    
    $img = $_POST['image'];
    $folderPath = "imagefolder/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);


include('connection.php');

$sql = "select visitor_key from visitors order by visitor_key desc limit 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if(!($row['visitor_key'])){
	   echo "<script type='text/javascript'>alert('ERROR FETCHING DATABASE , TRY AGAIN');
           window.location='image.html';
		 </script>";
	 $conn->close();  
	 exit();
	}
$v1_id = $row['visitor_key'];

    $file = $folderPath.$v1_id.'.png';
    file_put_contents($file, $image_base64);


$sql = "update visitors set visitor_image = '$file' where visitor_key = '$v1_id'";
if($conn->query($sql)==true){
	echo "<script type='text/javascript'>alert('WELCOME TO RVCE!');
		 </script>";
}
else{
	echo "<script type='text/javascript'>alert('ERROR UPDATING DATABASE , TRY AGAIN');
           window.location='image.html';
		 </script>";
	 $conn->close();  
	 exit();
}

$conn->close();

echo "<script type='text/javascript'>
           window.location='passgeneration.php';
		 </script>";

?>