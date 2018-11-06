<!DOCTYPE html>

<html lang="en">
<head>
  <script src="..jquery/jquery-3.3.1.js"></script>  
  <link rel="stylesheet" href="bootstrap/4.1.3/css/bootstrap.min.css" />  
  <script src="bootstrap/4.1.3/js/bootstrap.min.js"></script>  
  <style type="text/css">
    .gunther{
      position: relative;
      left: 100px;
      top:50px;
    }

    .error {color: #FF0000;}
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
  <div class="gunther"><img src="back.png" onclick="history.go(-1);" width="30"><a href="login-page2.php"><img src="home-button.png" width="30"></a></div>

<div class="container">
  <?php
    
     include('database.php');
      
      $query = "SELECT * FROM users";
    
      $result = $db->query($query);
       
    ?>
    <!-- dungag -->
    <?php
// define variables and set to empty values
$nameErr = $usernameErr = $emailErr = $passwordErr = $roleErr = "";
$name = $username = $email = $password = $role = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }
    
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["role"])) {
    $roleErr = "role is required";
  } else {
    $role = test_input($_POST["role"]);
  }
}

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    
    ?>
 <!-- FOR INSERTING NEW USER -->
  <h5>Insert New User</h5>
   <br>
      <div class="row">
        
      <div class="co-sm-4">
          
      <!-- <form action="insert.php" method="POST" id="add_form"> -->
      <p><span class="error">* required field</span></p>
    <form method="POST" action="<?php echo htmlspecialchars("insert.php"  ); ?>" id="user_table">
      
      <div class="form-group">
        <label for="name">Name:</label>
        <span class="error">*<?php echo $nameErr;?></span>
        <input type="name" class="form-control" id="name" name="name" value="<?php echo $name;?>">
      </div>

      <div class="form-group">
        <label for="username">Username:</label>
        <span class="error">* <?php echo $usernameErr;?></span>
        <input type="username" class="form-control" id="username" name="username" value="<?php echo $username;?>">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
      </div>

      <div class="form-group">
        <label for="pwd">Password:</label>
        <span class="error">* <?php echo $passwordErr;?></span>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>">
      </div>

  <div class="form-group">
  <label for="role">Role:<label>
    <span class="error">* <?php echo $roleErr;?></span>
    <form action="insert.php">
      <select name="role">
        <option>--Select</option>
        <option value="admin">Admin</option>
        <option value="poic">POIC Operator</option>
      </select>
</div>
   
       <div align="center">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      
    </form>
     </div>
    </div>
     </div>
     <div class="col-sm-8">
      <h5>Users</h5>
     <table class="table table-striped">
      <thead>
        <tr>
         
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Action</th>
         
        </tr>
       </thead>
      

       <tbody>
        
        <?php
 
        while($row = $result->fetchArray()){
         ?>
            
        <tr>
    
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
       
       <td><input type="button" name="Update" id="update" data-toggle="modal" data-target="#update_data_Modal" value="Update" href="edit_controller.php? id=<?php echo $row['id']; ?>"class="btn btn-xs update_data">
        <a href="delete_controller.php? id=<?php echo $row['id']; ?>" class="btn btn-danger" button onclick="alert('Are you sure you want to delete this existing account?')">Delete</button></a> 
         </td>
         </tr>
     
        
           <?php
            }
           
        ?>
     </tbody>
    </table>
   </div> 
 

<!-- FOR UPDATING A USER -->
<div id="update_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5>Update User</h5>
    </div>
   
      <div class="modal-body" id="user_table">
    <form method="POST" id="update_form" action="edit_controller.php">
     <label>Name</label>
     <input type="text" name="name" id="name" class="form-control" <?php echo $row['name']; ?>/>
     <br />
     <label>Username </label>
     <input type="text" name="username" id="username" class="form-control" <?php echo $row['username']; ?>/>
     <br />
     <label>Email</label>
     <input type="text" name="email" id="email" class="form-control" <?php echo $row['email']; ?> />
     <br />  
     <label>Password</label>
     <input type="password" name="password" id="password" class="form-control" <?php echo $row['password']; ?>/>
     
     <br/>
     <div class="form-group">
     <label for="role">Role:<label>
      <form action="insert.php">
        <select name="role">
          <option>--Select</option>
          <option value="admin">Admin</option>
          <option value="poic">POIC Operator</option>
        </select>
   </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="insert" id="updateInsert" value="Insert" class="btn btn-success"/>
    </form>
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
    </div>
   </div>
  </div>  

</div>


 <!-- <script>
 // $(document).ready(function(){  
 //      $('#update').click(function(){  
 //           $('#updateInsert').val("Insert");  
 //           $('#update_data_Modal')[0].reset();  
 //      });  
      // $(document).on('click', '.update_data', function(){  
      //      var user_id = $(this).attr("id");  
      //      $.ajax({  
      //           url:"edit_controller.php",  
      //           method:"POST",  
      //           data:{user_id:user_id},  
      //           dataType:"json",  
      //           success:function(data){  
      //                $('#name').val(data.name);  
      //                $('#username').val(data.username);  
      //                $('#email').val(data.email);  
      //                $('#password').val(data.password);
      //                $('#user_id').val(data.id);  
      //                $('#updateInsert').val("Insert");  
      //                // $('#update_data_Modal').modal('show');  


      //           }  
      //      });  
      // });  
      // $('#update_form').on("submit", function(event){  
      //      event.preventDefault();    
      //           $.ajax({  
      //                url:"edit_controller.php",  
      //                method:"POST",
      //                data:$('#update_form').serialize(),  
      //                beforeSend:function(){  
      //                     $('#updateInsert').val("Inserting");  
      //                },  
      //                success:function(data){  
      //                     $('#update_form')[0].reset();  
      //                     $('#update_data_Modal').modal('hide');  
      //                     $('#user_table').html(data);  
      //                }  
      //           });  
      //      }  
      });  
      // $(document).on('click', '.update_data', function(){  
      //      var user_id = $(this).attr("id");  
      //      if(user_id != '')  
      //      {  
      //           $.ajax({  
      //                url:"edit_controller.php",  
      //                method:"POST",  
      //                data:{user_id:user_id},  
      //                success:function(data){  
      //                     $('#user_detail').html(data);  
      //                     // $('#update_data_Modal').modal('show');  
      //                }  
      //           });  
      //      }            
      // });  
 });  
 </script>
  --></body>
</html>