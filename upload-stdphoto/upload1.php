<?php

include('../dbconnection.php');

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId = 0;
 
 $ImageData = $_POST['image_path'];
 
 $ImageName = $_POST['image_name'];
 $sid = $_POST['recent_sid'];

 
 $ImagePath = "LibMS/upload-stdphoto/uploads/$sid.jpg";
 

 file_put_contents('uploads/'.$sid.'.jpg',base64_decode($ImageData));



 $InsertSQL = "UPDATE students SET photo='$ImagePath' where sid='$sid'";
 
 if(mysqli_query($conn, $InsertSQL)){

 echo "Your Image Has Been Uploaded.";
 }
 
 }else{
 echo "Not Uploaded".$conn->error;
 }
mysqli_close($conn);
?>