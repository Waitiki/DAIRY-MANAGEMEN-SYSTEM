<?php

error_reporting(0);
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
   $sql="SELECT * FROM user WHERE usertype='admin' ";
   $result=mysqli_query($data,$sql);
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">
<head>
<meta charset="utf-8">
<title>ADMIN DASHBOARD</title>
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style type="text/css">
.table_th{
	padding: 20px;
	font-size: 20px;
	background-color: white;
	
}

.table_td(
     padding: 20px;
	 background-color: tomato;
)

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
<h1>Admin Data</h1>
<?php
if($_SESSION['message'])
{
	echo $_SESSION['message'];
}

unset($_SESSION['message']);

?>
<table border="1px">
<tr>
<th class="table_th">Username</th>
<th class="table_th">Email</th>
<th class="table_th">Phone</th>
<th class="table_th">Password</th>
<th class="table_th">Delete</th>
<th class="table_th">Update</th>
</tr>
<?php

while($info=$result->fetch_assoc())
{
?>
<tr style="background-color:skyblue">
<td class="table_td">
<?php echo "{$info['username']}";?>
</td>
<td class="table_td">
<?php echo "{$info['email']}";?>
</td>
<td class="table_td">
<?php echo "{$info['phone']}";?>
</td>
<td class="table_td">
<?php echo "{$info['password']}";?>
</td>
<td class="table_td">
<?php 
echo "<a onClick=\"javascript:return confirm('Are You Sure You Want To Delete This');\" class='btn btn-danger'href='delete_admin.php?admin_id={$info['id']}'>Delete</a>";
?>
</td>
<td class="table_td">
<?php echo "<a class='btn btn-primary' href='update_admin.php?admin_id={$info['id']}'> Update </a>";?>
</td>

</tr>
<?php
}
?>
<tr
</table>
</center>
</div>
</section>
</body>
</html>