<?php
  include('../dbconnection.php');

  if(isset($_POST["name"])){
      $name = $_POST["name"];
      $catagory = $_POST["catagory_id"];
      $currentdate = $_POST["currentdate"];
      $details = $_POST["details"];
      $uid = $_POST["userid"];
      $quantity = $_POST["quantity"];
      $author = $_POST["author"];
      $cost = $_POST["cost"];
      $dateofadd = $_POST["dateofadd"];
      
      $sql = "INSERT INTO products 
      (pname,category_id,dateofpost,details,uid,quantity,author,cost,dateofadd,remaining,primary_photo)
      VALUES('$name','$catagory','$currentdate','$details','$uid','$quantity','$author','$cost','$dateofadd', '$quantity','nothing_for_now')";

      if(mysqli_query($conn, $sql)){
        echo json_encode(['status'=>'success' , 'recent_pid'=>mysqli_insert_id($conn)]);
        
      }
      else{
        echo json_encode(['status'=>'failed']);
      }
      

      
    }
$conn -> close();
?>
