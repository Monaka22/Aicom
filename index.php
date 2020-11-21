<html>
<head>
<title>IT Book Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<?php
session_start();
if($_SESSION["user_id"]==""){
	echo "Please Login!";
	exit();
}
	include "conect.php";
	$strSQL ="SELECT * FROM users WHERE username='".$_SESSION["user_id"]."'";
	$objQuery = $mysqli->query($strSQL);
	$objResult = mysqli_fetch_assoc($objQuery);
?>
<body>
<div align="right">&nbsp;<b>Name:</b>&nbsp; <?php echo $objResult["username"];?><br><a href="edit_profile.php">Edit Profile</a></div>
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">

	<!-- Header -->
	<?php include("header.php"); ?>

	</div></td>
  </tr>
  <tr></tr>
  <tr>
    <td width="24%" valign="top"><div align="center" >

	<!-- Menu -->
	<?php include("menu.php"); ?>

	</div></td>
    <td width="76%">

	<!-- Container -->
	<?php 
	if (empty($_GET["page"])){
		$_GET["page"]="Home";
	}
	switch ($_GET["page"]) {
	case "home":
		//echo "Home";
		include("page_home.php");
		break;
	case "add":
		//echo "Home";
		include("addformpro.php");
		break;
	case "stock":
		echo "Home -> Product";
		include("stock.php");
		break;
	case "product":
		include("page_home.php");
		break;
	case "editproduct":
		include("editform.php");
		break;
	case "type":
		include("page_home_type.php");
		break;
	case "edittype":
		include("edittypeform.php");
		break;
	case "addtype":
		include("addtypeform.php");
		break;
	case "logout":
	include("logout.php");
	break;
	default:
	 //echo "Home";
		include("page_home.php");
	}
	?>
	</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
	<!-- Footer -->
	<?php include("footer.php"); ?>
	</div></td>
  </tr>
</table>
</body>
</html>