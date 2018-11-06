<?php
 include 'database.php';

 // $eq_id = $_POST['eq_id'];
 $eqmt_name = $_POST['eqmt_name'];
 $model = $_POST['model'];
 $serial_no = $_POST['serial_no'];
 $description = $_POST['description'];
 $category = $_POST['category'];
 $eq_ui = $_POST['eq_ui'];
 $remarks = $_POST['remarks'];
 $qty = $_POST['qty'];
 $location = $_POST['location'];

 
 $query_e = "INSERT INTO EQUIPMENT(eqmt_name, model, serial_no, description, category, eq_ui, remarks, qty, location) VALUES ('$eqmt_name', '$model','$serial_no', '$description', '$category', '$eq_ui', '$remarks', '$qty', '$location')";



 if($db->exec($query_e)) {


	$type = "equipment";
	$action = $eqmt_name . " Added in" . $location ;
	$date = date('d-m-Y');


    $query="INSERT INTO logs(type, action, date ) VALUES ('$type','$action', '$date')";
    $result_equip =$db->exec($query);
  

     header('location: nicts.php?location='.$location);
 }
 else {
     echo "Error in querying a user";
 }

