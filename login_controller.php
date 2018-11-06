<?php 
include 'database.php';


 $username = $_POST['username'];
 $password = $_POST['password'];

 $result = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' ");



if(count($result->fetchArray()) != 1)
{

	$type = "account";
	$action = $username . " logged in" ;
	$date = date('d-m-Y');


      $query="INSERT INTO logs(type, action, date ) VALUES ('$type','$action', '$date')";
      
      $result_acc =$db->exec($query);

  //If user and pass match any of the defined users
  $_SESSION['loggedin'] = true;
  unset($db);
  header("Location: login-page2.php");
} else {

	header("Location: login-page.php");

}


