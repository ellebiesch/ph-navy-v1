<?php
 include 'database.php';

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $username = $_POST['username'];
 $role = $_POST['role'];
 $created_at = date('d-m-Y');
 $updated_at = date('h:i:sa');


//checks if the email is existing
$queery = "SELECT * FROM users WHERE email = '$email' ";
$result = $db->query($queery);


if(count($result->fetchArray()) !=1) {

	header('location: register.php');

} else{

 // checks if the all fields are filled up.
	$has_data = true;
	foreach ($_POST as $key => $value) {
		if ($value == "") {

			$has_data = false;
		
		}
	}
	if ($has_data) {


	 	$query = "INSERT INTO users(name, email, password, username, role, created_at, updated_at) VALUES ('$name', '$email','$password', '$username', '$role', '$created_at', '$updated_at')";
	 
	 	
		if($db->exec($query)) {   
			header('location: register.php');
		} else {
		    echo "Error in querying a user";
		} 
	} else { 
		header('location: register.php');
	}
}	


