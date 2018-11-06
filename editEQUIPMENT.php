<!DOCTYPE html>

<html lang="en">
<head>
  <style type="text/css">
    .gunther{
      position: relative;
      left: 100px;
      top:50px;
    }
  </style>
<title>Update</title>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
    
<body>
<div class="gunther"> <img src="back.png" onclick="history.go(-1);" width="30"></div>
<div class="container">

<?php
    
include('database.php');
    
$eq_id = $_GET['eq_id'];    
    
$query = "SELECT * FROM EQUIPMENT WHERE eq_id='$eq_id'";  
    
$result = $db->query($query);    
    
?>
<h4><center>Update Equipment?</center></h4>
        
<form action="editSTATION_controller.php" method="post">
    <?php
    
    while($row = $result->fetchArray()) {
           
    ?>
    
<input type="hidden" name="eq_id" value="<?php echo $row['eq_id']; ?>">
    
  <div class="form-group">
      <label for="qty">QTY:</label>
      <input type="number" class="form-control" name="qty" min="1" value="<?php echo $row['qty']; ?>" >
    </div>

    <div class="form-group">
      <label for="eqmt_name">EQMT:</label>
      <input type="text" class="form-control" name="eqmt_name" value="<?php echo $row['eqmt_name']; ?>" >
    </div>
  
    <div class="form-group">
      <label for="eq_ui">U/I:</label>
      <input type="eq_ui" class="form-control" name="eq_ui" value="<?php echo $row['eq_ui']; ?>">
    </div>
        
     <div class="form-group">
      <label for="description">DESCRIPTION:</label>
      <input type="description" class="form-control" name="description" value="<?php echo $row['description'] ?>">
    </div>
    
    <div class="form-group">
      <label for="model">MODEL:</label>
      <input type="model" class="form-control" name="model" value="<?php echo $row['model']?>">
    </div>
      

    <div class="form-group">
      <label for="serial_no">SERIAL_NO:</label>
      <input type="serial_no" class="form-control" name="serial_no" value="<?php echo $row['serial_no']?>">
    </div>


    <div class="form-group">
      <label for="remarks">REMARKS:</label>
      <input type="remarks" class="form-control" name="remarks" value="<?php echo $row['remarks']?>">
    </div>

    <input type="hidden" name="location" value="<?php echo $row['location']?>">
        
        
   
      <?php
      
        }

      ?>
      
      <div align="center">
    <button type="submit" class="btn btn-success">Update</button>
    </div>
   
        </form>
    </div>
 <script src="jquery/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>