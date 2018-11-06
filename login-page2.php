<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<script src="js/jquery-2.0.3.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <title>login</title>
   <link rel="stylesheet" type="text/css" href="login.css">
   <link rel="stylesheet" type="text/css" href="dropdown.css"> 
  
</head>

<body>
<p style="font-weight: normal; font-family: monospace; margin-left: 10px;">
<?php
    if(isset($username['username'])){
      echo "Welcome". $username['username'] ."!";
    }
?>
</p>


<div class="home-container">
<center><img src="images/logo.png" style="width: 15%; height: 27%"; /></center>

<div class="smelly-cat">
 <ul>
<li><a href="#"><img src="drpdwn.png" width="70";/></a>
  <ul>
    <li><a href="register.php">register a user</a></li>
    <li><a href="logs.php">logs</a></li>
    <li><a href="logout.php" button onclick="alert('Are you sure you want to logout from this account?')">logout</button></a></li>
  </ul>
</li>
</ul>
</div>

	<center>
	<div class="form-group">
   		 <h1>NAVAL INFORMATION AND COMMUNICATION TECHNOLOGY STATION DAVAO</h1>
     </div>
  <div class="form-button">   
    <form action=" " method="GET">
		 	
		<!-- //Choose your station buttons -->
        <a href="nicts.php?location=general"><button name="station" type="button" value="general">GENERAL</button></a>
				<a href="nicts.php?location=davao"><button name="station" type="button" value="NICTS">NICTS DAVAO</button></a>
				<a href="nicts.php?location=surigao"><button name="station" type="button" value="surigao">Surigao</button></a>
				<a href="nicts.php?location=kalamansig"><button name="station" type="button" value="kalamansig">Kalamansig</button></a>
				<a href="nicts.php?location=maitum"><button name="station" type="button" value="maitum">Maitum</button></a>
				<a href="nicts.php?location=maasim"><button name="station" type="button" value="maasim">Maasim</button></a>
				<a href="nicts.php?location=balut"><button name="station" type="button" value="balut">Balut</button></a> 
				<a href="nicts.php?location=tinaca"><button name="station" type="button" value="tinaca">Tinaca</button></a>
				<a href="nicts.php?location=san_agustin"><button name="station" type="button" value="san agustin">San Agustin</button></a>
		</form>
    </div>
		</center>
       
</div>
</center> 
<script type="text/javascript">
  function myFunction(){
    document.getElementById("myDropdown").classList.toggle("show");
  }

  window.onclick = function(e){
    if (!e.target.matches('.dropbtn')) {
      var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }
</script>
</body>
</html>
	