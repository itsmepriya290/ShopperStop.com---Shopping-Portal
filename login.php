<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['user_id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE user_id = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['user_id'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>



<html>
<head>
<title>LOGIN Page</title>
<style>
.box{
	height:450px;
	width:400px;
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
.lgn_rgstr:hover{
	background:linear-gradient(#03C 45%, #4479BA 65%);
}
</style>
<script>
function validate()
{
	var user = document.forms["form1"]["user_id"].value;
	var pass = document.forms["form1"]["password"].value;
	if(user == "")
	{
		alert("Please enter your user id");
		document.forms["form1"]["user_id"].focus();
		return false;
	}
	if(pass == "")
	{
		alert("Please enter your password");
		document.forms["form1"]["password"].focus();
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
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a><a class="link_btn" href="about.php">About Us</a><a class="link_btn" href="product.php">Show Products</a><a class="link_btn" href="contact.php">Contact Us</a>
    </div></div>

<div class="box">

<?php /*if(empty($_SESSION["user_id"])) { */ ?>
<form action="#" method="post" onSubmit="return validate()" name="form1">
    <div class="error-message"> <?php /*if(isset($message)) { echo $message; }*/ ?></div>
    
    <img class="image" src="admin.png"><div class="heading"><h2 align="center">LOG - IN</h2><hr></div><br>
    <table align="center"><tr><td><p>User ID</p></td><td><input class="input_box" placeholder="Your User Name" type="text" name="user_id" value=""></td></tr>
           <tr><td><p align="center">Password</p></td><td><input class="input_box" placeholder="********" type="password" name="password" value=""></p></td></tr>
            <tr><td colspan="2"><p align="center"><input class="lgn_rgstr" type="submit" name="sign-in" onClick="return validate()" value="Sign-IN"></p></td></tr>
    </table>
</form>
<b><p align="center" style="margin-right:-60px;">Or</p></b>
<b><p align="center" style="margin-right:-60px;">New User ?</p></b>
<p align="center"><a href="register.php"><input class="lgn_rgstr" type="submit" name="register" value="REGISTER"></a></p>
</div>
</div>
</body>
</html>
