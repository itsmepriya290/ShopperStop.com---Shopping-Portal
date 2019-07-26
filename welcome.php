<?php
//session_start();
require('session.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
?>

<html>
<head>
<title>Product Checkout</title>
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
.add_cart{
    background-color: #f44336;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

</style>
</head>
<body style="background:url(banner.jpg);">
<div class="bd">
	<div class="title">
    	<img class="img" src="title.JPG" /><h3 style="margin-top:-10px; color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Online Store</h3>
    </div>
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a><a class="link_btn" href="about.html">About Us</a><a class="link_btn" href="product.php">Show Products</a><a class="link_btn" href="contact.php">Contact Us</a>
    <h3 style="margin-top:-20px; margin-left:730px;">Welcome <?php echo $login_session; ?></h3>
    <a class="link_btn" style="float:right; margin-right:10px; margin-top:-47px; width:80px;" href="logout.php">Logout</a>
    </div></div>
    
	

<?php

//here i am accessing the session for cart_item and showing in below table
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<div style="margin-left:200px;">
<div style="height:55px; width:370px; background:#0CF;"><h1 align="center">Order Summary</h1></div>
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left; border-bottom:#03F 2px solid;"><strong>Name</strong></th>
<th style="text-align:left; border-bottom:#03F 2px solid;"><strong>Code</strong></th>
<th style="text-align:right; border-bottom:#03F 2px solid;"><strong>Quantity</strong></th>
<th style="text-align:right; border-bottom:#03F 2px solid;"><strong>Price</strong></th>

</tr>	
<?php		
	//here i have stored the array of cart_item in $item and display all the items(ex. name, code, quantity,price)
    foreach ($_SESSION["cart_item"] as $item){
?>

<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><p style="margin-right:-20px;"><strong>
				<?php echo $item["name"]; ?></strong></p><input type="hidden" name="prname" value="<?php echo $item["name"]; ?>"></td>
				<td style="text-align:left;border-bottom:#F0F0F0 2px solid;">
				<?php echo $item["code"]; ?><input type="hidden" name="prcode" value="<?php echo $item["code"]; ?>"></td>
				<td style="text-align:right;border-bottom:#F0F0F0 2px solid;">
				<?php echo $item["quantity"]; ?><input type="hidden" name="prquantity" value="<?php echo $item["quantity"]; ?>"></td>
				<td style="text-align:right;border-bottom:#F0F0F0 2px solid;">
				<?php echo $item["price"]; ?><input type="hidden" name="prprice" value="<?php echo $item["price"]; ?>"></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}}
		?>

<tr>
<td colspan="2" align=right><strong>Total:</strong> <?php echo $item_total.".00"; ?></td>
<td colspan="5" align=right><input type="submit" name="chkout" class="add_cart" value="Proceed to checkout" onClick="call_login()"/></td>
</tr></tbody></table>	
</div>    
    
</div>
<script>
function call_login()
{
	window.open("payment.php");
}
</script>
</body>
</html>