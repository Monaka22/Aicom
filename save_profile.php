 <?PHP
session_start();
if($_SESSION["UserID"] == "")
{ echo"Please login!";
exit();
}
include "conect.php";
if($_POST["pass"] != $_POST["conpass"])
{echo "Pasword not Match!!";
echo "<meta http-equiv='refresh' content ='2;url=edit_profile.php' />";
exit();
}
$strSQL = "UPDATE member SET Password = '".trim($_POST['pass'])."',Name = '".trim($_POST['name'])."'WHERE UserID = '".$_SESSION["UserID"]."'";
$objQuery = $mysqli->query($strSQL);
echo "Save Completed!<br>";
if ($_SESSION["Status"] == "admin")
{
	echo "Record Updated";
	echo "<meta http-equiv='refresh' content ='2;url=admin.php' />";
}
else
{	
	echo "Record Updated";
	echo "<meta http-equiv='refresh' content ='2;url=User.php' />";
}
mysqli_close($mysqli);
?>