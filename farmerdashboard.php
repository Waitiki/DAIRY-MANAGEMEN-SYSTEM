<?php

session_start();
   
   if(!isset($_SESSION['username']))
   {
	   header("location:home.html");
   }
    elseif($_SESSION['usertype']=='admin')
   {
	   header("location:home.html");
   }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>FARMER DASHBOARD</title>
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<input  type="checkbox" id="check">
<label for="check">
<i class="fas fa-bars" id="btn"></i>
<i class="fas fa-times" id="cancel"></i>
</label>
<div class="sidebar">
<header>FARMER</header>
<ul>
<li><a href="view farmer_records.php"><i class="fas fa-stream"></i>View Records</a></li>
<li><a href="About.html"><i class="fas fa-question-circle"></i>About</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>
<section></section>
</body>
</html>