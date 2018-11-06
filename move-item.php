<?php  include 'moveEcho_controller.php';?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    .gunther{
      position: relative;
      left: 100px;
      top:50px;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="gunther"> <img src="back.png" onclick="history.go(-1);" width="30"></div>

  <div class="container">

    <?php
    // MAKITA NIYA KUNG UNSA ANG GI CLICK NA ID
      // include('database.php');
          
      $eq_id = $_GET['eq_id'];    
          
      $query = "SELECT * FROM EQUIPMENT WHERE eq_id='$eq_id'";  
          
      $result = $db->query($query);    
          
      ?>
    
      <!-- DIRI MUADTO PAG E QUERY NA NIYA -->
        <form action="move_controller.php" method="POST">
    <?php
    
    while($row = $result->fetchArray()) {
           
    ?>
  <br>

  <h1>Item name</h1>
    <div class="row">
      
      <div class="co-sm-8">
        

      <input type="hidden" name="eq_id" value="<?php echo $row['eq_id']; ?>">


      <div class="form-group">
        <label for="qty">Equipment:</label>
        <input type="text" class="form-control" name="eqmt_name"  value="<?php echo $row['eqmt_name']; ?>" readonly >
      </div>

        <div class="container-drpdwn">
          <label for="qty">Quantity:</label>
          <input type="hidden" class="form-control" name="Quantity" value="<?php echo $row['qty']; ?>">
          <select name="qty" id="qty">
            <option>--select--</option>
            <?php 
                        
                for ($i=0; $i < $row['qty']; $i++){ ?>
                    <option>
                        <?php  
                            echo $i + 1; 
                           
                        ?>
                        
                    </option>

            <?php 
                }
            ?>
        </div>
            
         <div class="form-group">
          <label for="location">From:</label>
          <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['location']; ?>" readonly>
        </div>

          <div class="container-drpdwn">
          <form action="move_controller.php" method="POST">
            <label for="">To:</label>
            <select class="display-size" name ="to_location" onchange="location = this.value;">
                <option selected> --select-- </option>
                <option value="balut">BALUT</option>
                <option value="general">GENERAL</option>
                <option value="davao">NICTS DAVAO</option>
                <option value="surigao">SURIGAO</option>
                <option value="kalamansig">KALAMANSIG</option>
                <option value="maitum">MAITUM</option>
                <option value="maasim">MAASIM</option>
                <option value="tinaca">TINACA</option>
                <option value="san_agustin">SAN AGUSTIN</option>
            </select>
          </div>
      
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </form>
  </div>
 </div>
</div>


<div class="col-sm-8">
<br><br><br><br><br><br>
<center><h4>Moved equipment logs</h4></center>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>ACTION</th>
        <th>QUANTITY</th>
        <th>DATE</th>
      </tr> 
    </thead>

    <tbody>
        <?php  
          while($row =$logs->fetchArray()){
         ?>
                  
          <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['action']; ?></td>
              <td><?php echo $row['qty']; ?></td>
              <td><?php echo $row['date']; ?></td>
          </tr>

      <?php
         }
      ?>
  
    </tbody>
</table>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
</div>
<?php
}
?>