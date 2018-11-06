<?php 
	include 'database.php';

    $query_c= "SELECT DISTINCT id, action, qty, date FROM moved_logs";
  

     $logs = $db->query($query_c);
  	
?>
