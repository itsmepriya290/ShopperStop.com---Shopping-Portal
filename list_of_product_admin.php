<?php
//session_start();
require('session.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
?>

<html>
<head>
<title>List of product</title>
<style>
.bd	{
	height:900px;
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

.box{
	height:350px;
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

<?php
//Search Section
if(isset($_POST['searchbycode']))
{
	
    $prod_code =  $_POST['search_prod'];
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
    
    $sql = "select * from tblproduct where code = '$prod_code'";
	$result = mysqli_query($con, $sql);
    
    while($row=mysqli_fetch_array($result))
    {
        $name=$row[1];
        $code=$row[2];
        $price=$row[4];
    }
}


//Update student section
if(isset($_POST['update_product']))
{
	if(isset($_POST['update_name']) && isset($_POST['update_code']) && isset($_POST['update_price']))	
    {
		$name = $_POST['update_name'];
		$code = $_POST['update_code'];
		$price = $_POST['update_price'];

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
		$sql = "UPDATE tblproduct SET name='$name',code='$code',price='$price' WHERE code='$code'";
		if(mysqli_query($con, $sql))
			echo "Records were updated successfully!";
		else
			echo "Could not able to update".mysqli_error($con);
	}
}

//Delete student section
if(isset($_POST['delete_product']))
{
	$code = $_POST['update_code'];
	$con = mysqli_connect('localhost','root','');
	if(!$con)
	{
		
		die("Database connection failed".mysqli_error($con));
    }
    $select_db = mysqli_select_db($con,'student');
    if(!$select_db)
    {
        die("Database selection failed".mysqli_error($con));
    }
    $sql = "delete from tblproduct where code = '$code'";
	if(mysqli_query($con,$sql))
		echo "<h2 style='color:red;'>Record deleted successfully</h2>";
	else
		echo "<h2 style='color:red;'>Error deleting record</h2>";
}


?>


</head>
<body style="background:url(banner.jpg);">
<div class="bd">
	<div class="title">
    	<img class="img" src="title.JPG" /><h3 style="margin-top:-10px; color:#FFF; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">Online Store</h3>
    </div>
    
    <!--Menus-->
    
    <div class="menu"><div style="margin-top:5px;">
    	<a class="link_btn" href="index.php">Home</a><h3 style="margin-top:-20px; margin-left:730px;">Welcome Admin</h3>
    	<a class="link_btn" style="float:right; margin-right:8px; margin-top:-45px; width:80px;" href="logout.php">Logout</a>
        
    </div></div>
    
    <!--List of available product table, accessing from databse table-->
    <div style="height:auto; width:500px; border:2px solid #000; margin-top:20px;">
    <h2 align="center"><u>List of available product</u></h2>
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
        
        $sql = "select * from tblproduct";
        $result = mysqli_query($con, $sql);
        ?><table align="center" cellpadding="4" border="2px">
        <th style="padding-left: 5px; padding-right: 5px;">Product Name </th><th>Product Code</th><th>Product Price</th>
        <?php	
        while($row=mysqli_fetch_array($result))
        {
			//Creating rows of available product with code and price
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[4]</td></tr>";
            
        }
    ?>
    </table>
    </div>

	<div style="height:auto; width:450px; border:2px solid #000; margin-top:-400px; margin-left:550px;">
    
    <!--Search form for product-->
    <form name="form_update" method="post" action="#">
    <table>
    <br><br>
    <h2><u>Serch Form</u></h2>
        <tr><td>Enter product code for search</td><td><input type="text" name="search_prod"></td>
            <td><input type="submit" name="searchbycode" value="Search"></td></tr>
        <tr><td>Product Name</td><td><input type="text" name="update_name" value="<?php echo $name; ?>"></td></tr>
        <tr><td>Product Code </td><td><input type="text" name="update_code" value="<?php echo $code; ?>"/></td></tr>
        <tr><td>Product Price</td><td><input type="text" name="update_price" value="<?php echo $price; ?>"/></td></tr>
        <tr><td><input type="submit" name="update_product" value="Update Product Detail"/></td>
            <td><input type="submit" name="delete_product" value="Delete Product Detail"/></td>
        </tr>  
    </table>
    </form>
    
    <!--Search form end-->
	</div>
    
</div>
</body>
</html>