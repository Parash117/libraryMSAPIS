<?php
	include('../dbconnection.php');

	$sid = $_GET["keyword"];
	//increaseView(sid);
	//creating a query
	$smt = $conn->prepare("SELECT sid, name, facultyid, phoneno, email, semesterid, photo FROM students
		WHERE sid = '$sid'");
	//executing the query
	$smt->execute();
	//binding results to the query
	$smt->bind_result($sid, $name, $facultyid, $phoneno, $email, $semesterid, $photo);
	$products = array();
	//traversing through all the result
	while($smt->fetch()){
		$temp = array();
		$temp['sid'] = $sid;
		$temp['name'] = $name;
		$temp['facultyid'] = $facultyid;
		$temp['phoneno'] = $phoneno;
		$temp['email'] = $email;
		$temp['semesterid'] = $semesterid;
		$temp['photo'] = $photo;
		array_push($products, $temp);
	}
	//displaying the result in json format
	echo json_encode($products);
?>
