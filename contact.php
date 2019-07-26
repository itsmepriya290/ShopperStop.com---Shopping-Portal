<?php

//database connection configuration
require('connect.php');
if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['user_msg']))
{
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$phone = $_POST['user_email'];
	$msg = $_POST['user_msg'];
	//storing contact page information in database below
	$query = "INSERT INTO `contact` (name, email, phone, message) VALUES ('$name','$email','$phone','$msg')";
	$result = mysqli_query($con,$query);
	if($result)
	{
		
        $message = "Message successfully sent.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
        
		header('Location: contact.php');
	}
	else
	{
		?><html><script>alert("Something went wrong!");</script></html>
        <?php	
	}
	
}


?>
<html>
<head>
<title>Contact US</title>
<style>
.bd	{
	height:1000px;
	width:1060px;
	background:#FFF;
	margin-left:160px;
	margin-top:-15px;
}
.title{
	height:120px;
	background:#090;
	margin-top:-15px;
	border:1px solid #000;
}
.img{
	margin-top:20px;
}
.menu{
	width:1050px;
	height:30px;
	background:#4479BA;
	padding:5px;
}
.link_btn {
   
    border-radius: 4px;
    border: solid 1px #20538D;
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
	margin-top:5px;
}

.contact_area{
	width:650px;
	height:400px;
	border:3px solid #009;
	border-radius:7px;
	margin-left:150px;
	margin-top:50px;
}

.in_box{
	height:40px;
	width:340px;
	border-radius:4px;
	margin-left:100px;
}

.in_txtarea{
	height:120px;
	width:340px;
	border-radius:4px;
	margin-left:100px;
}
	
.sbmt_rst{
	width:120px;
	height:40px;
	background:linear-gradient(#4479BA 45%, #03C 65%);
	font-weight:bold;
	color:#FFF;
	padding:5px;
}
.sbmt_rst:hover{
	background:linear-gradient(#03C 45%, #4479BA 65%);
}

</style>

<script>
function validate()
{
	var user_name = document.forms["form1"]["user_name"].value;
	var user_email = document.forms["form1"]["user_email"].value;
	var user_phone = document.forms["form1"]["user_phone"].value;
	var user_msg = document.forms["form1"]["user_msg"].value;
	
	//here i am checking any blank field is present or not
	if(user_name == "")
	{
		alert("Please enter your name");
		document.forms["form1"]["user_name"].focus();
		return false;
	}
	if(user_email == "")
	{
		alert("Please enter your email");
		document.forms["form1"]["user_email"].focus();
		return false;
	}
	if(user_phone == "")
	{
		alert("Please enter your phone number");
		document.forms["form1"]["user_phone"].focus();
		return false;
	}
	if(user_msg == "")
	{
		alert("Please enter your query");
		document.forms["form1"]["user_msg"].focus();
		return false;
	}
}

</script>
</head>
<body style="background:url(banner.jpg);">
<div class="bd">
	<div class="title">
    	<img class="img" src="title.JPG" /><h3 style="margin-top:-10px; color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Online Store</h3>
    </div>
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a><a class="link_btn" href="about.html">About Us</a><a class="link_btn" href="product.php">Show Products</a><a class="link_btn" href="contact.php">Contact Us</a><a class="link_btn" style="float:right; margin-right:8px; margin-top:-7px; width:80px;" href="login.php">Login</a>
    </div></div>
	<div class="contact_area">
    	<h2><u>Contact Us</u></h2>
        <form method="post" name="form1" onSubmit="return validate()">
        <table><tr><td><h4 style="margin-left:50px;">Name: </h4></td><td><input type="text" class="in_box" placeholder="Your Name" name="user_name"/></td></tr>
        		<tr><td><h4 style="margin-left:50px;">Email ID: </h4></td><td><input name="user_email" type="text" class="in_box" placeholder="Email ID(example@abc.com)"/></td></tr>
        		<tr><td><h4 style="margin-left:50px;">Ph. Number: </h4></td><td><input name="user_phone" type="number" class="in_box" placeholder="Phone Number"/></td></tr>
        		<tr><td><h4 style="margin-left:50px;">Your Message: </h4></td><td><textarea name="user_msg" class="in_txtarea" placeholder="Type Your Message Here"></textarea></td></tr>
                <tr><td colspan="2"><div style="margin-left:255px;">
                <input onClick="return validate()" class="sbmt_rst" type="submit" value="SEND"/>&nbsp;&nbsp;
                <input class="sbmt_rst" type="reset" value="CANCEL"/></div></td></tr>
        </table>
        </form>
        
    </div>


</div>
</body>
</html>

