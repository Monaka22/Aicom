 <?PHP
session_start();
if($_SESSION["user_id"] == "")
{ echo"Please login!";
exit();
}
include "conect.php";
if($_POST["pass"] != $_POST["conpass"])
{echo "Pasword not Match!!";
echo "<meta http-equiv='refresh' content ='2;url=edit_profile.php' />";
exit();
}
$strSQL = "UPDATE users SET password = '".trim($_POST['pass'])."',name = '".trim($_POST['name'])."'WHERE user_id = '".$_SESSION["user_id"]."'";
$objQuery = $mysqli->query($strSQL);
echo "<meta http-equiv='refresh' content ='0;url=index.php' />";
mysqli_close($mysqli);
?>