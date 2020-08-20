<?php
  include('../dbconnection.php');

  if(isset($_POST["username"])){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $hash_pass = md5($password . "2e1d6c693bdc7822e7de");
      $name = $_POST["name"];
      
      
      $email = $_POST["email"];
      $address = $_POST["address"];
      $gender = $_POST["gender"];
      $dob = $_POST["dob"];
      
      //fullname,countryname,email,address,gender,username,password,dob_text,phoneno
      $sql = "INSERT INTO users (name,username,password,email,address,gender,dateofbirth)VALUES('$name','$username','$hash_pass','$email','$address','$gender','$dob')";

      if(mysqli_query($conn, $sql)){
        echo json_encode(['status'=>'success']);
      }
      else{
        echo json_encode(['status'=>'failed']);
      }
    }
$conn -> close();
?>
