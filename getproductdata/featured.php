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
		$sql = "SELECT name, address from users where uid='$uid'";
		$result = mysqli_query($conn, $sql);
		
        $row = mysqli_fetch_assoc($result);
        $udet['uname'] = $row['name'];
        $udet['uaddress'] = $row['address'];	  		
        $conn -> close();	
      	return $udet;
      	

	}

	if(isset($_GET["loads"])){
	$offset = $_GET["loads"];
	$smt = $conn->prepare("SELECT pid, pname, dateofpost, conditionofproduct, details, primary_photo FROM products ORDER BY views DESC LIMIT 5 OFFSET $offset");
	
	//executing the query 
	$smt->execute();
	
	//binding results to the query 
	$smt->bind_result($pid,$pname,$datem,$condition,$details,$imagelink);
	
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
		$temp['uid'] = getuid($pid, $conn);

      	//getting user's name and address from users table using uid
      	$temp2 = array();
      	$temp2 = getudet($temp['uid']);
      	$temp['username'] = $temp2['uname'];
      	$temp['address'] = $temp2['uaddress'];
      	$temp['primaryimage'] = $imagelink;


		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);
	}
	else{
		//creating a query
	$smt = $conn->prepare("SELECT * FROM products ORDER BY pid DESC LIMIT 5");
	
	//executing the query 
	$smt->execute();
	
	//binding results to the query 
	$smt->bind_result($pid,$pname,$details,$category_id,$dateofpost,$uid ,$quantity,$author,$cost,$dateofadd,$remaining,$primary_photo);
	
	$products = array(); 
	$uid = 0;
	//traversing through all the result 
	while($smt->fetch()){
		$temp = array();
		$temp['pid'] = $pid;
		$temp['pname'] = $pname; 
		$temp['details'] = $details;
		$temp['dateofpost'] = $dateofpost; 
		$temp['category_id'] = $category_id;
		$temp['uid'] = $uid;
		$temp['quantity'] = $quantity; 
		$temp['author'] = $author;
		$temp['cost'] = $cost;
		$temp['dateofadd'] = $dateofadd;
		$temp['remaining'] = $remaining;
		
		//geting uid from user_product_rel table using pid
		//$temp['uid'] = getuid($pid, $conn);

      	//getting user's name and address from users table using uid
      	//$temp2 = array();
      	//$temp2 = getudet($temp['uid']);
      	//$temp['username'] = $temp2['uname'];
      	//$temp['address'] = $temp2['uaddress'];
      	$temp['primaryimage'] = $primary_photo;

		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);
	}

	
?>