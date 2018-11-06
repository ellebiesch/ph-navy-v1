<?php
include('database.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "UPDATE users SET name='$name', username='$username', email='$email', password = '$password' WHERE id='$id'";

 if($db->exec($query)) { 
     
 header('location:register.php');
     
 }else{
     
     echo "Error updating a query";
     
 
}
?>