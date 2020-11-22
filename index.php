<html>
<head>
<title>ร้านพฤกษา</title>
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
<div align="right">&nbsp;<b>Name:</b>&nbsp; <?php echo $objResult["name"];?><br><a href="edit_profile.php">Edit Profile</a></div>
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">
	<?php include("header.php"); ?>
	</div></td>
  </tr>
  <tr></tr>
  <tr>
    <td width="24%" valign="top"><div align="center" >
	<?php include("menu.php"); ?>
	</div></td>
    <td width="76%">
	<?php 
	if (empty($_GET["page"])){
		$_GET["page"]="Home";
	}
	switch ($_GET["page"]) {
	case "home":
		include("page_home.php");
		break;
	case "add":
		include("addformpro.php");
		break;
	case "stock":
		include("stock.php");
		break;
	case "addstock":
		include("addstock.php");
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
		include("page_home.php");
	}
	?>
	</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
	<?php include("footer.php"); ?>
	</div></td>
  </tr>
</table>
</body>
</html>