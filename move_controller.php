<?php
 include 'database.php';


$eq_id = $_POST['eq_id'];    
    
$query = "SELECT * FROM EQUIPMENT WHERE eq_id='$eq_id'";  
    

$result = $db->query($query);    
    

$equipment_data = $result->fetchArray();


 // $eq_id = $_POST['eq_id'];
 
 $eqmt_name = $_POST['eqmt_name'];
 $model = $equipment_data['model'];
 $serial_no = $equipment_data['serial_no'];
 $description = $equipment_data['description'];
 $category = $equipment_data['category'];
 $eq_ui = $equipment_data['eq_ui'];
 $remarks = $equipment_data['remarks'];
 $qty = $_POST['qty'];
 $location = $_POST['to_location'];


 
 $query_a = "INSERT INTO EQUIPMENT(eqmt_name, model, serial_no, description, category, eq_ui, remarks, qty, location) VALUES ('$eqmt_name', '$model','$serial_no', '$description', '$category', '$eq_ui', '$remarks', '$qty', '$location')";

 	 if($db->exec($query_a)) {

 }
 else {
     echo "Error in querying a user";
 }

// para mag minus sa quantity of the equipment
$qty = $equipment_data['qty'] - $_POST['qty'];
$query = "UPDATE EQUIPMENT SET qty='$qty' WHERE eq_id='$eq_id'";


 if($db->exec($query)) { 
     
    
    $eqmt_name = $_POST['eqmt_name'];
	$action = $eqmt_name . " moved to " . $location ;
	$qty = $_POST['qty'];
	$location = $_POST['location'];
	$date = date('d-m-Y');


    $query="INSERT INTO moved_logs(eqmt_name, action, qty, location, date ) VALUES ('$eqmt_name', '$action', '$qty', '$location', '$date')";
    $result_items= $db->exec($query);
  
 header('location: nicts.php?location='.$location);
     
 }
else{
     
     echo "Error deleting a query";
     
 }
?>