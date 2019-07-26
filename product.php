<?php

session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_GET["action"])) 
{
	//creating switch case for add product, remove product, empty cart and checkout
	switch($_GET["action"]) {
	
	//add switch case to add product on mouseclick.
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	//add switch case end here
	
	
	//remove switch case to remove selected item on mouseclick
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	//remove switch case end here
	
	
	//emty cart switch case to empty shopping cart on one mouseclick
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
	//empty switch case end here
	
	//checkout switch case to redirect user on checkout page
	case "checkout":
		header("Location: login.php");
	break;
	
	
//	index.php?action=checkout
}
}
?>
<html>
<head>
<title>Home | Buy on cheap Price</title>
<style>
.bd	{
	height:1150px;
	width:1060px;
	background:#FFF;
	margin-left:160px;
	margin-top:-15px;
	border:2px solid #003;
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

.img_p{
	height:280px;
	width:180px;
}

.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: #FFF;
    background: #6aadf1;
	margin-bottom:10px;
}

.add_cart{
    background-color: #f44336;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


.product-item {	
	float:left;	
	height:330px;
	background: #ffffff;
	margin:15px 10px;	
	padding:5px;border:#CCC 1px solid;
	border-radius:4px;
}
}

.product-price {    
	color: #005dbb;
    font-weight: 600;
}

#btnEmpty {
	background-color: #f44336;
    border: #FFF 1px solid;
    padding: 1px 10px;
	color:white;
    text-decoration: none;
	margin-left:100px;
    border-radius: 4px;
}

</style>
</head>
<body style="background:url(banner.jpg);">
<div class="bd">
	<div class="title">
    	<img class="img" src="title.JPG" /><h3 style="margin-top:-10px; color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Online Store</h3>
    </div>
    <div class="menu"><div style="margin-top:5px;"><a class="link_btn" href="index.php">Home</a><a class="link_btn" href="about.php">About Us</a><a class="link_btn" href="product.php">Show Products</a><a class="link_btn" href="contact.php">Contact Us</a><a class="link_btn" style="float:right; margin-right:8px; margin-top:-7px; width:80px;" href="login.php">Login</a>
    </div></div>
    <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="product.php?action=empty">Click Here to Empty Cart</a> </div>
 
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	

<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<form action="welcome.php" method="post">
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><p style="margin-right:-20px;"><strong>
				<?php echo $item["name"]; ?></strong></p><input type="hidden" name="prname" value="<?php echo $item["name"]; ?>"></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;">
				<?php echo $item["code"]; ?><input type="hidden" name="prcode" value="<?php echo $item["code"]; ?>"></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;">
				<?php echo $item["quantity"]; ?><input type="hidden" name="prquantity" value="<?php echo $item["quantity"]; ?>"></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;">
				<?php echo $item["price"]; ?><input type="hidden" name="prprice" value="<?php echo $item["price"]; ?>"></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="product.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="3" align=right><strong>Total:</strong> <?php echo $item_total.".00"; ?></td>
<td colspan="5" align=right>
	<strong>
    
    	<!--<a href="#" class="add_cart" name="chkout">Checkout</a>-->
        <input type="submit" name="chkout" class="add_cart"/>
        <!--index.php?action=checkout-->
    </strong>
    </form>
</td>
</tr>
</tbody>
</table>		
  <?php
}
?>


    <div style="height:520px;width:1060px;">
    <?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
		
	?>
    
    <div class="product-item">
			<form method="post" action="product.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				<div class="product-image"><img class="img_p" src="<?php echo $product_array[$key]["image"]; ?>"></div>
				<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
				<div class="product-price"><?php echo $product_array[$key]["price"]; ?></div>
				<div style="margin-right:-25px;"><input type="text" name="quantity" value="1" size="2" /><input class="add_cart" type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
        </form>
    

</div>
</body>
</html>