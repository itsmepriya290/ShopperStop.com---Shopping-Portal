<?php
	require('connect.php');
	if(isset($_POST['user_name']) && isset($_POST['user_id']) && isset($_POST['user_email']) && isset($_POST['user_password']))
		$name = $_POST['user_name'];	
		$uid = $_POST['user_id'];
		$uemail = $_POST['user_email'];
		$upassword = $_POST['user_password']; 
	$query = "INSERT INTO `users` (name, user_id, email, password) VALUES ('$name','$uid','$uemail','$upassword')";
	$result = mysqli_query($con,$query);
	if($result)
	{
		//$msg = "User created successfully.";
		?><html><script>alert("User created successfully");
		//window.open('register.html');
        </script></html>
        <?php
		header('Location: login.php');
	}
	else
	{
		//$err_msg = "User registration failed.";
		?><html><script>alert("User registration failed");</script></html>
        <?php	
	}
?>