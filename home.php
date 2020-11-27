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
$id = $_SESSION["user_id"];
$strSQL = "SELECT * FROM users WHERE user_id=$id";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
?>

<body>
	<div class='container-fluid'>
		<div class="row">
			<!-- <div class="col-12" style="background-color: #49FF33;"> -->
				<div id="title" class="col-2" style="background-color: #233b27;">
					<h3 class="text-center text-white mt-3">ร้านพฤกษา</h3>
				</div>
				<div id="profile-name" class="col-10" style="background-color: #79B081;">
					<p class="text-right pt-2 text-white"><b>ชื่อพนักงาน : </b><?php echo $objResult["name"]; ?><br><a class="text-white" href="home.php?page=editprofile">แก้ไข ข้อมูลส่วนตัว</a></p>
				</div>
			<!-- </div> -->
			<div id="menu" class="col-2 m-0 p-0">
					<?php include("menu.php"); ?>
			</div>
			<div class="col-10 mt-3">
				<?php
				if (empty($_GET["page"])) {
					$_GET["page"] = "Home";
				}
				switch ($_GET["page"]) {
					case "home":
						include("sale.php");
						break;
					case "orderdetail":
					include("saledetail.php");
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
					case "reports":
						include("reports.php");
					break;
					case "reportpicker":
						include("reportpicker.php");
					break;
					case "reportsalepicker":
						include("reportsalepicker.php");
					break;
					case "topsale":
						include("topsale.php");
					break;
					case "lowstock":
						include("lowstock.php");
					break;
					default:
						include("sale.php");
				}
				?>
			</div>
		</div>
	<!-- </div> -->
</body>
</html>