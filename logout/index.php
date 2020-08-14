<?php
  include('../dbconnection.php');

      $uid = $_GET["uid"];

      $sql = "DELETE FROM login_session WHERE uid = '$uid'";
      if(mysqli_query($conn, $sql)){
        
      }
      $conn -> close();
?>
