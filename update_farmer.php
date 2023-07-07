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
   $id=$_GET['farmer_id'];
   
   $sql="SELECT * FROM user WHERE id='$id' ";
   $result=mysqli_query($data,$sql);
   $info=$result->fetch_assoc();
   
   if(isset($_POST['update']))
   {
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $phone=$_POST['number'];
	  $password=$_POST['password'];
	  
	  $query="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";
	  
	  $result2=mysqli_query($data,$query);
	  
	  if($result2)
	  {
		  header("location:view_farmer.php");
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

<h1> Update Farmer</h1>

<div class="div_deg">
<form action="#" method="POST">
<div>
<label>Username</label>
<input type="text" name="name" value="<?php echo "{$info['username']}" ?>">
</div>

<div>
<label>Email</label>
<input type="email" name="email" value="<?php echo "{$info['email']}" ?>">
</div>

<div>
<label>Phone</label>
<input type="number" name="number" value="<?php echo "{$info['phone']}" ?>">
</div>

<div>
<label>Password</label>
<input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
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