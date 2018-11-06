<?php
include 'database.php';

if(isset($_POST["id"])){
	$output = '';
	$query = "SELECT * FROM users WHERE id = '".$_POST["id"]."'";
	$result = $db->query($query);

$output .= '  
      <div class="table table-responsive">  
           <table class="table table-bordered">';
    while($row = $result->fetchArray())
    {
     $output .= '
     <tr>  
            <td width="40%"><label>Name</label></td>  
            <td width="20%">'.$row["name"].'</td>  
        </tr>
        <tr>  
            <td width="40%"><label>Username</label></td>  
            <td width="20%">'.$row["username"].'</td>  
        </tr>
        <tr>  
            <td width="40%"><label>Email</label></td>  
            <td width="20%">'.$row["email"].'</td>  
        </tr>
        <tr>  
            <td width="40%"><label>Password</label></td>  
            <td width="20%">'.$row["password"].'</td>  
        </tr>
  
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>
