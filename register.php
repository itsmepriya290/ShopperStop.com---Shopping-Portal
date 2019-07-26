<html>
<head>
<title>Register Page</title>
<style>
.box{
	height:590px;
	width:500px;
	border:2px solid #000;
	border-radius:10px;
	margin-left:320px;
	margin-top:50px;
}

.image{
	height:75px;
	width:75px;
	margin-left:40px;
}

.heading{
	margin-top:-65px;
	
}

.tr1{
	margin-top:20px;
}

.input_box{
	width:250px;
	height:40px;
	border:1px solid #063;
	border-radius: 7px;
	margin-top:15px;
}
.btn	{
	height:30px;
	width:200px;
	background:linear-gradient(#063 45%, #39C 75%);
	border-radius:7px;
	margin-right:-65px;
	font-weight:bold;
}

.btn:hover{
	background:linear-gradient(#39C 45%, #063 75%);
}

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

.lgn_rgstr{
	width:120px;
	height:40px;
	background:linear-gradient(#4479BA 45%, #03C 65%);
	font-weight:bold;
	color:#FFF;
	padding:5px;
	margin-right:-30px;
	margin-top:10px;
}
</style>
<script>
function validate()
{
	var user_name = document.forms["form1"]["user_name"].value;
	var user_id = document.forms["form1"]["user_id"].value;
	var user_email = document.forms["form1"]["user_email"].value;
	var user_pass = document.forms["form1"]["user_password"].value;
	
	if(user_name == "")
	{
		alert("Please enter your name");
		document.forms["form1"]["user_name"].focus();
		return false;
	}
	if(user_id == "")
	{
		alert("Please enter user ID");
		document.forms["form1"]["user_id"].focus();
		return false;
	}
	if(user_email == "")
	{
		alert("Please enter your email");
		document.forms["form1"]["user_email"].focus();
		return false;
	}
	if(user_pass == "")
	{
		alert("Please enter password");
		document.forms["form1"]["user_password"].focus();
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
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a><a class="link_btn" href="about.php">About Us</a><a class="link_btn" href="product.php">Show Products</a><a class="link_btn" href="contact.php">Contact Us</a><a class="link_btn" style="float:right; margin-right:8px; margin-top:-7px; width:80px;" href="login.php">Login</a>
    </div></div>

<div class="box">

<form action="register_auth.php" method="post" onSubmit="return validate()" name="form1" id="register">
<img class="image" src="admin.png"><div class="heading"><h2 align="center">Register</h2><hr></div><br>
<input type="hidden" name="submitted" id="submitted" value="1"/>
	<table align="center">
    	<tr><td><p>Name </p></td><td><input class="input_box" placeholder="Your Name" type="text" id="nm" name="user_name" value=""></td></tr>
       <tr><td><p align="center">Set User ID</p></td><td><input class="input_box" placeholder="Set User ID" type="text" id="uid" name="user_id" value=""></p></td></tr>
       <tr><td><p align="center">Email ID</p></td><td><input class="input_box" placeholder="Email ID (example@abc.com)" id="uemail" type="text" name="user_email" value=""></p></td></tr>
       <tr><td><p align="center">Password</p></td><td><input class="input_box" placeholder="********" type="password" id="upass" name="user_password" value=""></p></td></tr>
		<tr><td colspan="2"><p align="center"><input class="lgn_rgstr" onClick="return validate()" type="submit" name="register" value="Register"></p></td></tr>
</table>
</form>
<b><p align="center" style="margin-right:-60px;">Or</p></b>
<b><p align="center" style="margin-right:-60px;">Already Registered ?</p></b>
<p align="center"><a href="login.php"><input class="lgn_rgstr" type="submit" name="register" value="LOGIN"></a></p>
</div>
</body>
</html>
