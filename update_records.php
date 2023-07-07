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
   $time=$_GET['farmer_time'];
   
   $sql="SELECT * FROM records WHERE time='$time' ";
   $result=mysqli_query($data,$sql);
   $info=$result->fetch_assoc();
   
   if(isset($_POST['update']))
   {
	  $id=$_POST['id'];
	  $location=$_POST['location'];
	  $quantity=$_POST['quantity'];
	  
	  $query="UPDATE records SET id='$id',location='$location',quantity='$quantity' WHERE time='$time'";
	  
	  $result2=mysqli_query($data,$query);
	  
	  if($result2)
	  {
		  header("location:view_records.php");
	  }
	   
   }
   
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">
<head>
<meta charset="utf-8">
<title>ADMIN DASHBOARD</title>
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style type="text/css">

     label
	 {
		 display: inline-block;
		 width: 100px;
		 text-align: right;
		 padding-top: 10px;
		 padding-bottom: 10px;
	 }
	 .div_deg
	 {
		 background-color: skyblue;
		 width: 400px;
		 padding-bottom: 70px;
		 padding-top: 70px;
	 }

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

<h1> Update Farmer Records</h1>

<div class="div_deg">
<form action="#" method="POST">
<div>
<label>FarmerID</label>
<input type="text" name="id" value="<?php echo "{$info['id']}" ?>">
</div>

<div>
<label>Location</label>
<input type="text" name="location" value="<?php echo "{$info['location']}" ?>">
</div>

<div>
<label>Quantity</label>
<input type="number" name="quantity" value="<?php echo "{$info['quantity']}" ?>">
</div>

<div>
<input class="btn btn-success" type="submit" name="update" value="update">
</div>


</form>
</div>

</center>
</div>

</section>
</body>
</html>