<?php include ('database.php');
include ('logsACC_controller.php');
include ('logsEQUIP_controller.php');
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

/* Style tab links */
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 50%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: black;
    display: none;
    padding: 100px 20px;
    height: 100%;
}

table{text-align: center;}
#acc_logs {background-color: white;}
#equip_logs {background-color: white;}

</style>
</head>
<body>
<div class="gunther"> <img src="back.png" onclick="history.go(-1);" width="30"></div>
<button class="tablink" onclick="openPage('acc_logs', this, '#1B1E3A')">Account logs</button>
<button class="tablink" onclick="openPage('equip_logs', this, '#1B1E3A')" id="defaultOpen">Equipment logs</button>

<div id="acc_logs" class="tabcontent">

  <table class="table table-striped" style="width: 70%" align="center">
		<thead>
			<tr>
				<!-- <th>ID</th> -->
				<th>ACTION</th>
				<th>DATE</th>
			</tr>
	    </thead>
	    <tbody>
			 <?php
			        
			    while($row = $acc_logs->fetchArray()){
			    	
			     ?>
			            
			    <tr>
			       <!--  <td><?php //echo $row['id']; ?></td> -->
			        <td><?php echo $row['action']; ?></td>
			        <td><?php echo $row['date']; ?></td>
			    </tr>


	        <?php
	           
	            }
	           
	        ?>
		</tbody>
	</table>	
</div>	

<div id="equip_logs" class="tabcontent"> 
  <table class="table table-striped" style="width: 70%" align="center">
		<thead>
			<tr>
				<!-- <th>ID</th> -->
				<th>ACTION</th>
				<th>DATE</th>
			</tr>
		</thead>
	<tbody>
			 <?php
 
			        
			    while($row = $equip_logs->fetchArray()){
			     ?>
			            
			    <tr>
			        <!-- <td><?php //echo $row['id']; ?></td> -->
			        <td><?php echo $row['action']; ?></td>
			        <td><?php echo $row['date']; ?></td>
			    </tr>


	        <?php
	           
	            }
	           
	        ?>
		</tbody>
	</table>	
</div>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 

	