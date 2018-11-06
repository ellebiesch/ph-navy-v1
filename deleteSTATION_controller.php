<?php

$eq_id = $_GET['eq_id'];
$location = $_GET['location'];
$eqmt_name = $_GET['eqmt_name'];

include('database.php');

$query = "DELETE FROM EQUIPMENT WHERE eq_id='$eq_id'";

if($db->exec($query)){

	$type = "equipment";
	$action = $eqmt_name . " Deleted in" . $location ;
	$date = date('d-m-Y');


  $query="INSERT INTO logs(type, action, date ) VALUES ('$type','$action', '$date')";
  $result_equip =$db->exec($query);
    
       header('location:nicts.php?location='.$location); 

}
else {
     
    echo "Error deleting a query";
}


?>
