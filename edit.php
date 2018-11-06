<!DOCTYPE html>
<html>
 <head>

  <script src="bootstrap/js/jquery-3.3.1/jquery.min.js"></script>  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />  
  <script src="bootstrap/3.3.1/js/bootstrap.min.js"></script>  
 </head>
   <body>  
  <br/><br/>  
  <div class="container" style="width:700px;">  
   <h3 align="center">Update User</h3>  
   <br />  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Update</button>
    </div>
    <br />
     <div id="user_table">
      <table class="table table-bordered">
        <tr>
          <th width="70%"> Name </th>
          <th width="30%"> View </th>
        </tr>
      <?php

       while($row = $result->fetchArray()){
     

      ?>
    <tr>
       <td><?php echo $row["name"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row['id'];?>"class="btn btn-info btn-xs view_data"/></td>
       <a href="delete_controller.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs delete_data" button onclick="alert('Are you sure you want to delete this existing account?')">Delete</button></a> 

</td>
</tr>


   <?php
    }
   
?>



</tbody>
</table>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>

       </tr>
       <?php
       
     }
     ?>
   </table>
 </div>
</div>
</div>
</body>
</html>

<div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismissed="modal">&times; </button>
        <h4 class="modal-title"> Update user </h4>
        </div>
        <div class="modal-body">
         <form method="POST" action="edit_controller.php" id="edit-form">
          <label> Name </label>
          <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>">
          <br />
          <label> Username </label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']; ?>">
          <br />
          <label> Email </label>
          <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'] ?>">
          <br />
          <label> Password </label>
          <input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']?>">
          <br />
          <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success">

        </form>
      </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal header">
        <button type="button" class="close" data-dismiss="modal"> &times; </button>
        <h4 class="modal-title"> User details </h4>
      </div>
      <div class="modal-body" id="user_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#edit_form').on("submit", function(event){
      event.preventDefault();
      if($('#name').val()=="")
      {
        alert("Name is required");
      }
      else if($('#username').val()=="")
      {
        alert("Username is required");
      }
      else if($('#email').val()=="")
      {
        alert("Email is required");
      }
      else if($('#password').val()=="")
      {
        alert("Password is required");
      }
      else
      {
        $.ajax({
          url:"register.php",
          method:"POST",
          data:$('#edit_form').serialize(),
          beforeSend.function(){
            $('#insert').val("Inserting");
          },
          success:function(data){
            $('#edit_form')[0].reset();
            $('#add_data_Modal').modal('hide');
            $('#user_table').html(data);
          }
        });
      }
    }
  });



$(document).on('click', '.view_data', function(){
  var id = $(this).attr('id');
  $.ajax({
    url:"edit_controller.php",
    method: "POST",
  })
}

