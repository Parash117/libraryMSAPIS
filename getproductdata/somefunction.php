<?php
  include('../dbconnection.php');

  getuid(25,$conn);

  function getuid($pid, $conn){
  $pid = 25;
  $sql = "SELECT uid from user_product_rel where pid='$pid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
     	// output data of each row
     	while($row = mysqli_fetch_assoc($result)) {
       	echo $row['uid'];
      }
  }
  else{
  	$temp['uid'] = "";
  }
}
?>