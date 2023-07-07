<?php

session_start();
$host="localhost";
$user="root";
$password="";
$db="dairy_db";


$data=mysqli_connect($host,$user,$password,$db);

if($_GET['farmer_time'])
    {
		$user_time=$_GET['farmer_time'];
		$sql="DELETE FROM records WHERE time='$user_time'";
		$result=mysqli_query($data,$sql);
		
		if($result)
		{
			$_SESSION['message']=' Record Deleted Successfuly';
			header("location:view_records.php");
		}
	}

?>