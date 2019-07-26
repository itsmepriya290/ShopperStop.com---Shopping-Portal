<?php
//session_start();
require('session.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
?>

<html>
<head>
<titl>Admin Panel</title>
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

.link_box1 {
	height:200px;
	width:300px;
    border-radius: 4px;
    border: solid 1px #20538D;
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
	margin-top:5px;
	margin-left:60px;
}


.link_box2 {
	height:200px;
	width:300px;
    border-radius: 4px;
    border: solid 1px #20538D;
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
	margin-top:-217px;
	margin-left:400px;
}

</style>

</head>
<body style="background:url(banner.jpg);">
<div class="bd">
	<div class="title">
    	<img class="img" src="title.JPG" /><h3 style="margin-top:-10px; color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Online Store</h3>
    </div>
    
    <!--Menus-->
    
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a>
    <h3 style="margin-top:-20px; margin-left:730px;">Welcome Admin</h3>
    <a class="link_btn" style="float:right; margin-right:8px; margin-top:-45px; width:80px;" href="logout.php">Logout</a>
    </div></div>
    
    <div class="link_box1"> 
		<center><a href="registered_users_admin.php"><img src="users.png" style="height:160px;"><br>
    	<p style="font-size:18px;">Registered User List</p></a></center>	
        
    </div>
    
    <div class="link_box2">
		<center><a href="list_of_product_admin.php"><img src="product.jpg" style="height:160px;"><br>
    	<p style="font-size:18px;">Available Product</p></a></center>	
        
    </div>
    
    
    
    

</div>
</body>
</html>
