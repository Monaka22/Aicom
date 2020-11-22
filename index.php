<html>

<head>
	<title>ร้านพฤกษา</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<?php
session_start();
if ($_SESSION["user_id"] == "") {
	echo "Please Login!";
	exit();
}
include "conect.php";
$strSQL = "SELECT * FROM users WHERE username='" . $_SESSION["user_id"] . "'";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
?>

<body>
	
<!-- <div><b>Name:</b><?php echo $objResult["name"]; ?><br><a href="edit_profile.php">Edit Profile</a></div> -->
	<div class='container-fluid'>
		<div class="row">
				<div class="col-10">
					<h3 class="text-left">ร้านพฤกษา</h3>
				</div>
				<div class="col-2">
					<p class="text-right"><b>Name : </b><?php echo $objResult["name"]; ?><br><a href="index.php?page=editprofile"> Edit Profile </a></p>
				</div>
			<div class="col-3">
					<?php include("menu.php"); ?>
			</div>
			<div class="col-9">
				<?php
				if (empty($_GET["page"])) {
					$_GET["page"] = "Home";
				}
				switch ($_GET["page"]) {
					case "home":
						include("sale.php");
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
					case "editprofile":
						include("edit_profile.php");
						break;
					case "logout":
						include("logout.php");
						break;
					case "addsale":
						include("addsale.php");
						break;
					default:
						include("page_home.php");
				}
				?>
			</div>
		</div>
	<!-- </div> -->
</body>
</html>