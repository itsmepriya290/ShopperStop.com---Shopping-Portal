<?php
$con = mysqli_connect('localhost','root','');
if(!$con)
{
	die("Database connection failed".mysqli_error($con));
}
$select_db = mysqli_select_db($con,'shopperstop');
if(!$select_db)
{
	die("Database selection failed".mysqli_error($con));
}
?>