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
	//increaseView($getpid);
	//creating a query
	$smt = $conn->prepare("SELECT * FROM products
		WHERE pid = '$getpid'");
	//executing the query
	$smt->execute();
	//binding results to the query
	$smt->bind_result($pid, $pname, $details, $category_id, $dateofpost, $uid, $quantity, $author, $cost, $dateofadd, $remaining, $primary_photo);
	$products = array();
	//traversing through all the result
	while($smt->fetch()){
		$temp = array();
		$temp['pid'] = $pid;
		$temp['pname'] = $pname;
		$temp['details'] = $details;
		$temp['category_id'] = $category_id;
		$temp['dateofpost'] = $dateofpost;
		$temp['uid'] = $uid;
		$temp['quantity'] = $quantity;
		$temp['author'] = $author;
		$temp['cost'] = $cost;
		$temp['remaining'] = $remaining;
		$temp['dateofadd'] = $dateofadd;
		$temp['primary_photo'] = $primary_photo;
		array_push($products, $temp);
	}
	//displaying the result in json format
	echo json_encode($products);
?>
