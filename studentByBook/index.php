<?php
  include('../dbconnection.php');
  //$CONN1 = $conn;
  $bid = $_GET["bid"];
  $qry = "SELECT name, facultyid, phoneno, email, semesterid, photo FROM students INNER JOIN student_book_rel ON students.sid = student_book_rel.sid WHERE student_book_rel.pid = $bid";
    //$query = "SELECT sid from student_book_rel where pid=$bid";
    $stmt = $conn->prepare($qry);
    $stmt->execute();
    
   // $stmt->bind_result($sid);
    //while($stmt->fetch()){
        //$qry = "SELECT sid, name, facultyid, phoneno, email, semesterid, photo FROM students WHERE sid = $sid";
       // $stmt = $conn->prepare($qry);
       // echo $qry;
	//executing the query
	//$stmt->execute();
	//binding results to the query
	$stmt->bind_result($name, $facultyid, $phoneno, $email, $semesterid, $photo);
	$products = array();
	//traversing through all the result
	while($stmt->fetch()){
		$temp = array();
		//$temp['sid'] = $sid;
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
    //}
  ?>