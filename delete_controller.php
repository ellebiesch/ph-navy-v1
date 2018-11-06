<?php

$id = $_GET['id'];

include('database.php');

$query = "DELETE FROM users WHERE id='$id'";

if($db->exec($query )){
    
       header('location:register.php'); 
}
else {
     
    echo "Error deleting a query";
}


?>
