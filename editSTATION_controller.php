<?php
 include 'database.php';

 $eqmt_name = $_POST['eqmt_name'];
 $eq_id = $_POST['eq_id'];
 $model = $_POST['model'];
 $serial_no = $_POST['serial_no'];
 $description = $_POST['description'];
 // $category = $_POST['category'];
 $eq_ui = $_POST['eq_ui'];
 $remarks = $_POST['remarks'];
 $qty = $_POST['qty'];
 $location = $_POST['location'];


 $query_e = "UPDATE EQUIPMENT SET eqmt_name='$eqmt_name', eq_id='$eq_id', model= '$model', serial_no= '$serial_no', description= '$description', eq_ui= '$eq_ui', remarks= '$remarks', qty= '$qty' WHERE eq_id='$eq_id'";


 if($db->exec($query_e)) {


	$type = "equipment";
	$action = $eqmt_name . " Updated in" . $location ;
	$date = date('d-m-Y');


	  $query="INSERT INTO logs(type, action, date ) VALUES ('$type','$action', '$date')";
	  $result_equip =$db->exec($query);

     
     header('location: nicts.php?location='.$location);
 }
 else {
     echo "Error in querying a user";
 }

