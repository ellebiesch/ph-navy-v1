
<?php include 'database.php';?>
<?php include 'login-page.php';?>


<!-- SELECT ACCOUNT -->
<?php 
 base64_encode('admin');
 $result = $db->query("SELECT * FROM users WHERE id =  34"); 
while ($row = $result->fetchArray()) {
 $row['username'] . "<br>" . $row['password'];
}	

  $db->close();
   unset($db);

//Then we retrieve the posted values for user and password.
// $username = $_POST['id'];
// $password = $_POST['pass']; 

//Users defined in a SQLite database
// $result = $db->query("SELECT * FROM users WHERE id = 34 AND pass = pass");

// if ($result == 1)
// {
  //If user and pass match any of the defined users
//   $_SESSION['loggedin'] = true;
//   unset($db);
//   header("Location: login-page2.php");
// };

//If the session variable is not true, exit to exit page.
// if(!$_SESSION['loggedin'])
// {
//   unset($db);
//   header("Location: login-page.php");
//   exit;
// };

?>


  
  