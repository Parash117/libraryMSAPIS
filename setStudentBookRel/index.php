<?php
  include('../dbconnection.php');

  if(isset($_POST['pid'])){
      $pid = $_POST['pid'];
      $sid = $_POST['sid'];
      $dateoflend = date();
      //fullname,countryname,email,address,gender,username,password,dob_text,phoneno
      $sql = "INSERT INTO student_book_rel (pid, sid, dateoflend)VALUES('$pid','$sid','$dateoflend')";

      if(mysqli_query($conn, $sql)){
        echo json_encode(['status'=>'success']);
      }
      else{
        echo json_encode(['status'=>'failed']);
      }
    }
$conn -> close();
?>
