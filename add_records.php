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
   
   $host="localhost";
   $user="root";
   $password="";
   $db="dairy_db";
   
   $data=mysqli_connect($host,$user,$password,$db);
   
   if(isset($_POST['add_records']))
   {
	   $user_id=$_POST['id'];
	   $user_location=$_POST['location'];
	   $user_quantity=$_POST['quantity'];

		   			   
	   $sql="INSERT INTO records(id,location,quantity,time) VALUES('$user_id','$user_location','$user_quantity',now())";
	   
	   $result=mysqli_query($data,$sql);
	   
	   if($result)
	   {
		   echo "<script type='text/javascript'>
             alert('Data Uploaded Successfully');
		   </script>";
	   }
	   else
	   {
		   echo "Upload Failed";
	   }
	   }
   
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">
<head>
<meta charset="utf-8">
<title>ADMIN DASHBOARD</title>
<style type="text/css">
  label
  {
	  display: inline-block;
	  text-align: right;
	  width: 100px;
	  padding-top: 10px;
	  padding-bottom: 10px;
  }
  .div_deg{
	  background-color:skyblue; 
	  width: 400px;
	  padding-top: 70px;
	  padding-bottom: 70px;
  }
</style>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<section>
<div class="content">
<center>
<h1 style="color: white">Add Records</h1>
<div class="div_deg">
<form action="#" method="POST">
<div>
<label>farmers id</label>
<input type="number" name="id">
</div>
<div>
<label>Location</label>
<input type="text" name="location">
</div>
<div>
<label>Quantity</label>
<input type="quantity" name="quantity">
</div>
<input type="submit" class="btn btn-primary" name="add_records" value="Add Record">
</form>
</div>
</center>
</div>
</section>
</body>
</html>