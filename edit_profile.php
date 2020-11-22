 <?PHP
session_start();
if($_SESSION["user_id"] == "")
{ echo"Please login!";
exit();
}
include "conect.php";
$strSQL = "SELECT * FROM users WHERE user_id='".$_SESSION["user_id"]."'";
$objQuery =  $mysqli->query($strSQL);
$ObjResult = mysqli_fetch_assoc($objQuery);
?>
<html lang="en">
  <body>
		<tr>
    <h3>เปลี่ยนข้อมูลผู้ใช้ </h3>
     <form name="form1" method="post" action="save_profile.php">
    <table width="0" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td>ID :</td>
        <td><?PHP echo $ObjResult['user_id'];?></td>
      </tr>
      <tr>
        <td width="249">Name: </td>
        <td width="144"><label for="name"></label>
        <input type="text" name="name" id="name" value="<?PHP echo $ObjResult['name'];?>"></td>
      </tr>
      <tr>
        <td>Username: </td>
        <td><?PHP echo $ObjResult['username'];?></td>
      </tr>
      <tr>
        <td>Pass: </td>
        <td><label for="pass"></label>
        <input type="password" name="pass" id="pass" value="<?PHP echo $ObjResult['password'];?>"></td>
      </tr>
	  <tr>
        <td>ConfirmPass: </td>
        <td><label for="pass"></label>
        <input type="password" name="conpass" id="pass" value="<?PHP echo $ObjResult['password'];?>"></td>
      </tr>
    </table>
  <p>
    <input type="submit" name="button2" id="button2" value="เปลี่ยน">
    <input type="Reset" name="Reset" id="Reset" value="เอาใหม่">
  </p>
</form>
  </body>
</html>