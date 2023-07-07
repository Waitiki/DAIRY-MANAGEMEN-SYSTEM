<?php

session_start();
   
   if(!isset($_SESSION['username']))
   {
	   header("location:home.html");
   }
   elseif($_SESSION['usertype']=='farmer')
   {
	   header("location:home.html");
   }
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">
<head>
<meta charset="utf-8">
<title>ADMIN DASHBOARD</title>
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
<header>ADMIN DASHBOARD</header>
<ul>
<li><a href="add_farmer.php"><i class="fas fa-stream"></i>Add Farmer</a></li>
<li><a href="view_farmer.php"><i class="fas fa-sliders-h"></i>View Farmer</a></li>
<li><a href="add_records.php"><i class="fas fa-stream"></i>Add Records</a></li>
<li><a href="view_records.php"><i class="fas fa-sliders-h"></i>View records</a></li>
<li><a href="add_admin.php"><i class="fas fa-stream"></i>Add Admin</a></li>
<li><a href="view_admin.php"><i class="fas fa-sliders-h"></i>View Admins</a></li>
<li><a href="About.html"><i class="fas fa-question-circle"></i>About</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
</div>
<section></section>
</body>
</html>