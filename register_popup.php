<!DOCTYPE html>  
<html>  
 <head>  
  <script src="..jquery/jquery-3.3.1.min.js"></script>  
  <link rel="stylesheet" href="bootstrap/4.1.3/css/bootstrap.min.css" />  
  <script src="bootstrap/4.1.3/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
 
  <div class="container" style="width:850px;">  
     <?php
    
    include('database.php');

    if (isset($_GET['id'])) {
      $query = "SELECT * FROM users WHERE id='$id'";
      
    }else{
       $query = "SELECT * FROM users";
    }

    $result = $db->query($query);

    
    ?>
   
   <br />  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="user_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Name</th>  
       <th width="30%">Action</th>
      </tr>
         <?php
          while($row = $result->fetchArray()){
          ?>
            
      <tr>
    <td><?php echo $row["name"]; ?></td>  
    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>"class="btn btn-info btn-xs view_data"/>
    <input type="button" name="update" value="update" id="<?php echo $row["id"]; ?>"class="btn btn-xs update_data">
    <input type="button" name="delete" value="delete" id="<?php echo $row["id"]; ?>"class="btn btn-danger btn-xs delete_data"/></td>
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

    <!-- <h4 class="modal-title">User Details</h4> -->
   </div>
   <div class="modal-body">
    <form method="POST" id="user_detail" action="insert.php">
     <label>Name</label>
     <input type="name" name="name" id="name" class="form-control" /></input>
     <br />
     <label>Username </label>
     <input type="username" name="text" id="username" class="form-control"></input>
     <br />
     <label>Email</label>
     <input type="text" name="text" id="text" class="form-control" />
     <br />  
     <label>Password</label>
     <input type="password" name="password" id="password" class="form-control" />
     <input type="hidden" name="user_id" id="user_id" />  
     
     <br/>
    <div class="form-group">
     <label for="role">Role:<label>
      <select name="role">
        <option>--Select</option>
        <option value="admin">Admin</option>
        <option value="poic">POIC Operator</option>
      </select>
      <br>
      <br/>
    </div>
    </form>
    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
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
   <div class="modal-header">
    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
    <h4 class="modal-title">User Details</h4>
   </div>
   <div class="modal" id="user_detail">
    
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.update_data', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_controller.php",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#username').val(data.address);  
                     // $('#gender').val(data.gender);  
                     // $('#designation').val(data.designation);  
                     $('#email').val(data.email);  
                     $('#password').val(data.password);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#username').val() == '')  
           {  
                alert("Username is required");  
           }  
           else if($('#email').val() == '')  
           {  
                alert("Email is required");  
           }  
           else if($('#password').val() == '')  
           {  
                alert("Password is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#user_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var user_id = $(this).attr("id");  
           if(user_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data){  
                          $('#user_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 