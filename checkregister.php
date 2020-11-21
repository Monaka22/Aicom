<?PHP
$Name = $_REQUEST['name'];
$Uname = $_REQUEST['Uname'];
$Pass = $_REQUEST['Pass'];
include "conect.php";
$strSQL = "insert into users values (null,'$Uname','$Pass','$Name')";
$mysqli->query($strSQL) or die("error=$strsql");
mysqli_close($mysqli);
echo "<script type='text/javascript'>alert('ท่านสมัครสมาชิกเรียบร้อยแล้ว');</script>";
echo "<meta http-equiv='refresh'content='1;url=login.php' />";
?>