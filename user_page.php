<?php
session_start();
if($_SESSION["user_id"]==""){
	echo "Please Login!";
	exit();
}
	include "connect.php";
	$strSQL ="SELECT * FROM users WHERE user_id='".$_SESSION["user_id"]."'";
	$objQuery = $mysqli->query($strSQL);
	$objResult = mysqli_fetch_assoc($objQuery);
?>
<html>
<head>
<title><center>IT Book Online
</center></title>
</head>
<body><center>
	Welcome to User Page!</center><br>
	<table border="1" style="width: 300px" align="center">
	<tbody>
	<tr>
 <center><img border="0" src="images/top.png"></center></tr>
<tr>
		<tr>
			<td width="87">&nbsp;Username</td>
			<td width="197"><?php echo $objResult["username"];?></td>
		</tr>
		<tr>
			<td>&nbsp;Name</td>
			<td><?php echo $objResult["name"];?></td>
		</tr>
	</tbody>
	</table>
	<br><center>
	<a href="edit_profile.php">Edit</a>&nbsp;&nbsp;&nbsp;
	<a href="logout.php">Logout</a></center>
<div><center>
   <p>&copy; 2/02/2017<br>
	Address : 187/1 หมู่3 ต.สบเตี๊ยะ อ.จอมทอง จ.เชียงใหม่ รหัสไปรษณี 50160<br>
	Phone : 02145789<br>
	Email : dojisjis22@gmail.com<br>
<center></div>
</body>
</html>