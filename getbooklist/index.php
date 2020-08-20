<?php
	include('../dbconnection.php');
	//creating a query
	$smt = $conn->prepare("SELECT 	
							pid,
							pname,
							details,
							category_id,
							dateofpost,
							uid,
							quantity,
							author,
							cost,
							dateofadd,
							remaining,
							primary_photo FROM products");
	
	//executing the query 
	$smt->execute();
	
	//binding results to the query 
	$smt->bind_result(	
$pid,
$pname,
$details,
$category_id,
$dateofpost,
$uid,
$quantity,
$author,
$cost,
$dateofadd,
$remaining,
$primary_photo);
	
	$products = array(); 
	
	//traversing through all the result 
	while($smt->fetch()){
		$temp = array();
		$temp['pid'] = $pid;
		$temp["pname"] = $pname;
		$temp["details"] = $details;
		$temp["category_id"] = $category_id;
		$temp["dateofpost"] = $dateofpost;
		$temp["uid"] = $uid;
		$temp["quantity"] = $quantity;
		$temp["author"] = $author;
		$temp["cost"] = $cost;
		$temp["dateofadd"] = $dateofadd;
		$temp["remaining"] = $remaining;
		$temp["primary_photo"] = $primary_photo;primary_photo
		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);
	$conn -> close();
?>