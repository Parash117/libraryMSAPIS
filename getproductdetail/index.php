<?php
	include('../dbconnection.php');
	function getuid($pid){
		include('../dbconnection.php');
		$uuid=0;
		$sql = "SELECT uid from user_product_rel where pid='$pid'";
		$result = mysqli_query($conn, $sql);
		
        $row = mysqli_fetch_assoc($result);
        $uuid = $row['uid'];	  		
        $conn -> close();	
      	return $uuid;
      	

	}
	function getudet($uid){
		include('../dbconnection.php');
		$udet = array();
		$sql = "SELECT name, address,phoneno from users where uid='$uid'";
		$result = mysqli_query($conn, $sql);
		
        $row = mysqli_fetch_assoc($result);
        $udet['uname'] = $row['name'];
        $udet['uaddress'] = $row['address'];
        $udet['phone']	= $row['phoneno'];  		
        $conn -> close();	
      	return $udet;
      	

	}

	function increaseView($pid){
		include('../dbconnection.php');
		$sql = "UPDATE products SET views = views + 1 WHERE pid = '$pid'";
		if(mysqli_query($conn, $sql)){
        
      	}
		$conn -> close();
	}
	$getpid = $_GET["pid"];

	increaseView($getpid);

	//creating a query
	$smt = $conn->prepare("SELECT pid, pname, dateofpost, conditionofproduct, details, primary_photo FROM products 
						WHERE pid = '$getpid'");
	
	//executing the query 
	$smt->execute();
	
	//binding results to the query 
	$smt->bind_result($pid,$pname,$datem,$condition,$details, $imagelink);
	
	$products = array(); 
	$uid = 0;
	//traversing through all the result 
	while($smt->fetch()){
		$temp = array();
		$temp['pname'] = $pname; 
		$temp['dateofpost'] = $datem; 
		$temp['conditionofproduct'] = $condition; 
		$temp['details'] = $details;
		$temp['pid'] = $pid;
		//$temp['uid'] = "";
		$temp['username'] = "";
		$temp['address'] = "";

		//geting uid from user_product_rel table using pid
		$temp['uid'] = getuid($pid);

      	//getting user's name and address from users table using uid
      	$temp2 = array();
      	$temp2 = getudet($temp['uid']);
      	$temp['username'] = $temp2['uname'];
      	$temp['address'] = $temp2['uaddress'];
      	$temp['phone'] = $temp2['phone'];
      	$temp['primary_image'] = $imagelink;


		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);

	
?>