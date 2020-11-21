 <?PHP
session_start();
if($_SESSION["UserID"] == "")
{ echo"Please login!";
exit();
}
include "conect.php";
$strSQL = "SELECT * FROM member WHERE UserID='".$_SESSION["UserID"]."'";
$objQuery =  $mysqli->query($strSQL);
$ObjResult = mysqli_fetch_assoc($objQuery);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WP Keystore</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-md-offset-4">
        <div class="panel panel-danger  ">
        <div class="panel-heading">
		<tr>
<center><img border="0" src="img/11.PNG"></center></tr>
          <h3 class="panel-title"></h3><span class="glyphicon glyphicon-lock"></span>Editmember</h3>
   </div>
   <div class="panel-body">
     <form name="form1" method="post" action="save_profile.php">
  <div align="left">
    <p>เปลี่ยนข้อมูลผู้ใช้ </p>
    <table width="0" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td>ID :</td>
        <td><?PHP echo $ObjResult['UserID'];?></td>
      </tr>
      <tr>
        <td width="249">Name: </td>
        <td width="144"><label for="name"></label>
        <input type="text" name="name" id="name" value="<?PHP echo $ObjResult['Name'];?>"></td>
      </tr>
      <tr>
        <td>Username: </td>
        <td><?PHP echo $ObjResult['Username'];?></td>
      </tr>
      <tr>
        <td>Pass: </td>
        <td><label for="pass"></label>
        <input type="password" name="pass" id="pass" value="<?PHP echo $ObjResult['Password'];?>"></td>
      </tr>
	  <tr>
        <td>ConfirmPass: </td>
        <td><label for="pass"></label>
        <input type="password" name="conpass" id="pass" value="<?PHP echo $ObjResult['Password'];?>"></td>
      </tr>
    </table>
  </div>
  <p>
    <input type="submit" name="button2" id="button2" value="เปลี่ยน">
    <input type="Reset" name="Reset" id="Reset" value="เอาใหม่">
  </p>
</form>

   </div>
 </div>
 </div>
 </div>
 </div>

  </body>
</html>