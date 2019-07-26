<html>
<head>
<title>Home | Buy on cheap Price</title>
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
</style>
</head>
<body style="background:url(banner.jpg);">
<div class="bd">
	<div class="title">
    	<img class="img" src="title.JPG" /><h3 style="margin-top:-10px; color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Online Store</h3>
    </div>
    
    
    <!--Homepage Menus-->
    
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a><a class="link_btn" href="about.php">About Us</a><a class="link_btn" href="product.php">Show Products</a><a class="link_btn" href="contact.php">Contact Us</a><a href="admin.php">Admin Panel</a>
    <?php if(empty($_SESSION["user_id"])) { ?>
    <a class="link_btn" style="float:right; margin-right:8px; margin-top:-7px; width:80px;" href="login.php">Login</a>
    <?php
	} else {
	$result = mysqli_query($con,"SELECT * FROM users WHERE user_id='" . $_SESSION["user_id"] . "'");
	$row  = mysqli_fetch_array($result);
	?><h4 style="margin-top:-20px; margin-left:770px;">Hey <?php echo $login_session; ?></h4>
    <a class="link_btn" style="float:right; margin-right:10px; margin-top:-47px; width:80px;" href="#" name="logout">Logout</a>
    <?php } ?>
    </div></div>
    
	<div><marquee><img src="p1.jpg" /><img src="p2.jpg" /><img src="p3.jpg" /></marquee></div>
    <img style="height:305px;" src="home_pic.PNG" />
    <div  style="background:#FFF; height:50px; margin-top:-15px;"><h2 style="margin-left:10px;">Discounts for you</h2></div>
    <img style="height:220px; width:350px;" src="b1.PNG" /><img style="height:220px; width:350px;" src="b2.PNG" /><img style="height:220px; width:350px;" src="b3.PNG" />
</div>
</body>
</html>

<?php

if(isset($_POST['logout'])){
	session_start();
   if(session_destroy()) {
 	header("Location: login.php");
   }
}
?>