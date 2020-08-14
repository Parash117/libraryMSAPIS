<?php
  include('../dbconnection.php');

  if(isset($_POST["username"])){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $hash_pass = md5($password . "2e1d6c693bdc7822e7de");
      $uid = 0;
      $name="";
      $phoneno = "";
      $sql = "SELECT uid,name FROM users WHERE username='$username' && password='$hash_pass'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0 ) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $uid = $row["uid"];
            $name = $row["name"];
        }
        
        echo json_encode(['status'=>'success','uid'=>$uid, 'name'=>$name]);
        }
        else{
          echo json_encode(['status'=>'no_user']);
        }
      
}


$conn -> close();
?>
