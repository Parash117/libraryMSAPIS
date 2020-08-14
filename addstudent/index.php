<?php
  include('../dbconnection.php');

  if(isset($_POST["name"])){
      $name = $_POST["name"];
      $semid = $_POST["semid"];
      $facultyid = $_POST["facultyid"];
      $email = $_POST["email"];
      $uid = $_POST["uid"];
      $phoneno = $_POST["phoneno"];
      $gender = $_POST["gender"];
      $address = $_POST["address"];
      
      $sql = "INSERT INTO students (name, facultyid, semesterid, phoneno, email, address, gender, photo)VALUES('$name','$facultyid','$semid', '$phoneno', '$email', '$address', '$gender', 'nothing'),  ";

      if(mysqli_query($conn, $sql)){
        echo json_encode(['status'=>'success' , 'recent_sid'=>mysqli_insert_id($conn)]);
        
      }
      else{
        echo json_encode(['status'=>'failed']);
      }
      

      
    }
$conn -> close();
?>
