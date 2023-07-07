<?php

session_start();
$host="localhost";
$user="root";
$password="";
$db="dairy_db";


$data=mysqli_connect($host,$user,$password,$db);

if($_GET['admin_id'])
    {
		$user_id=$_GET['admin_id'];
		$sql="DELETE FROM user WHERE id='$user_id'";
		$result=mysqli_query($data,$sql);
		
		if($result)
		{
			$_SESSION['message']='Admin Deleted Successfuly';
			header("location:view_admin.php");
		}
	}

?>