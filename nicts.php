<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="NICTS.css">
	<link rel="stylesheet" type="text/css" href="dropdown.css">
	
	<title>NICTS</title>
</head>
<body>
<div class="home-container">

	<div class="gunther"><a href="login-page2.php" ><img src="home-button.png" width="30"></a></div> 
 
<div class="container">



	<?php
    
    include('database.php');
    $location = '';

    if(!isset($_GET['location'])){
    	
    	$query = "SELECT * FROM EQUIPMENT";
    	$location = 'general';

	} else{
		$location = $_GET['location'];
		if($location == 'general'){
			
			// $query = "SELECT * FROM EQUIPMENT";
			$query = "SELECT eqmt_name, description, remarks, sum(qty) FROM EQUIPMENT GROUP BY lower(eqmt_name)";

		} else {
	    	$query = "SELECT * FROM EQUIPMENT WHERE location = '$location' ";
		}
	}


    $result = $db->query($query);
    
    ?>
 

<center><h1> <?= ucwords(str_replace("_", " ", $location));?></h1></center>

<div class="container-search">
<input class="display-size" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search " title="Type in a name" > 
</div>

<div class="view-btn">

	 <a href="ExportPDF.php?location=<?=$location;?>"><button name="station" type="button" value="general" class="display-size">Export to PDF</button></a>
	<!-- <button id="exportButton" class="display-size">Export to PDF</button> -->
</div>


<div class="container-drpdwn">
	<select id="ross" onchange="location = this.value;">
		<option selected>--select--</option>
		<option value="nicts.php?location=balut">BALUT</option>
		<option value="nicts.php?location=general">GENERAL</option>
		<option value="nicts.php?location=davao">NICTS DAVAO</option>
		<option value="nicts.php?location=surigao">SURIGAO</option>
		<option value="nicts.php?location=kalamansig">KALAMANSIG</option>
		<option value="nicts.php?location=maitum">MAITUM</option>
		<option value="nicts.php?location=maasim">MAASIM</option>
		<option value="nicts.php?location=tinaca">TINACA</option>
		<option value="nicts.php?location=san_agustin">SAN AGUSTIN</option>
	</select>
</div>
<?php
		
	if($location !='general'){ 
	echo "<button id='myBtn' class='display-size'>ADD ITEM</button>";
	};
?>


<div id="myModal" class="modal">
	
		<div class="modal-content">
			<span class="close"> &times; </span>
			<h4 class="modal-header">NICTS</h4>
			<form action="insert_equip.php" method="POST">	
				SERIAL-NO.:<br> <input type="text" id="serial-no" class="display-size" name="serial_no"><br>
				NAME:<br> <input type="text" id="eqmt_name" class="display-size" name="eqmt_name" ><br>
				MODEL:<br> <input type="text" id="model" class="display-size" name="model">
				DESCRIPTION:<input type="text" id="description" class="display-size" name="description"><br>
				QUANTITY:<br> <input type="number" id="qty" class="display-size" name="qty" ><br>
				U/I:<br> <input type="text" id="u/i" class="display-size" name="eq_ui"><br>
				

				REMARKS:<br> <input type="text" id="remarks" class="display-size" name="remarks"><br>
				CATEGORY: <br> <input type="text" id="category" class="display-size" name="category"><br>

				<script>
					function hideShow( selectObj, DivId ) {
					    if (selectObj.options[selectOdj.selectedIndex].value == 2) {
					        document.getElementById(DivId).style.display='block';
					    } else {
					        document.getElementById(DivId).style.display='none';
					    }
					}
					</script>

				LOCATION: 
				<select name="thisname" name="location" onchange="hideShow(this,'nextDiv')">
					<option value="<?=$location?>">NICTS DAVAO</option>
					<option value="<?=$location?>">BALUT</option>
					<option value="<?=$location?>">SURIGAO</option>
					<option value="<?=$location?>">KALAMANSIG</option>
					<option value="<?=$location?>">MAITUM</option>
					<option value="<?=$location?>">MAASIM</option>
					<option value="<?=$location?>">TINACA</option>
					<option value="<?=$location?>">SAN AGUSTIN</option>
				</select><br>
				<input class="display-size" type="submit" value="submit" placeholder="ADD ITEM">
			</form>
			
		</div>
</div>
<center>
<table id="myTable" class="table">
		<thead class="thead-dark">
			<th scope="col">QTY</th>
			<th scope="col">EQMT</th>
	<?php
    	if($location !='general'){
		
			echo '<th scope="col">U/I</th>';
    	}
    ?>
			<th scope="col">DESCRIPTION</th>
	<?php 
    	if($location !='general'){
		
			echo '<th scope="col">MODEL</th>';
			echo '<th scope="col">SERIAL-NO</th>';
    	}
    ?>
	
			<th scope="col">REMARKS</th>
			<th scope="col"><i>Function</i></th>
		</thead>

		<tbody>
			 <?php
 
    while($row = $result->fetchArray()){
     ?>
            
    <tr>
        <td><?php 
        	if($location =='general') {
        		echo $row['sum(qty)'];
        	} else {
        		echo $row['qty'];
        	}
        	 ?> 	
     	</td>
        	
        		
        <td><?php echo $row['eqmt_name']; ?></td>
    <?php
    	if($location !='general'){
			echo "<td>" . $row['eq_ui'] ."</td>";
    	}
    ?>
        
        <td><?php echo $row['description']; ?></td>

     <?php
     	if($location !='general'){
     		echo "<td>" . $row['model'] ."</td>";
        	echo "<td>" . $row['serial_no'] ."</td>";
     	}
        
     ?>
        <td><?php echo $row['remarks']; ?></td>

     
        <td>
        <a href="editEQUIPMENT.php?eq_id=<?php echo $row['eq_id']; ?>" class="display-size fc-btn edit"  role="button">Edit</a>
        <a href="deleteSTATION_controller.php?eq_id=<?php echo $row['eq_id']; ?>&location=<?=$location?>&eqmt_name=<?=$row['eqmt_name']?>" class="display-size fc-btn del"  button onclick="alert('Are you sure you want to delete this equipment?')">Delete</button></a> 
        <a href="move-item.php?eq_id=<?php echo $row['eq_id']; ?>" class="display-size fc-btn move" role="button">Move</a>

        </td>
    </tr>
     
        
           <?php
            }
           
        ?>
		</tbody>
	</table>
</center>

</div>
</div>
<script type="text/javascript">
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");
	var span = document.getElementsByClassName("close")[0];
	btn.onclick = function(){
		modal.style.display = "block";
	}

	span.onclick = function(){
		modal.style.display = "none";
	}

	window.onclick = function(event){
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>

<script type="text/javascript">
	
	function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
    	var firstCol_1 = rows[i].cells[1].textContent.toUpperCase();
        var firstCol = rows[i].cells[5].textContent.toUpperCase();
        var secondCol = rows[i].cells[3].textContent.toUpperCase();
        var fourthCol = rows[i].cells[4].textContent.toUpperCase();
        if (firstCol_1.indexOf(filter) > -1 || firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || fourthCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>

</body>
</html>