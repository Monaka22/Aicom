<?PHP
  if ($_SESSION["user_id"] == "") {
    echo "Please login!";
    exit();
  }
  include "conect.php";
  $strSQL = "SELECT * FROM users WHERE user_id='" . $_SESSION["user_id"] . "'";
  $objQuery =  $mysqli->query($strSQL);
  $ObjResult = mysqli_fetch_assoc($objQuery);
  ?>
 <html lang="en">

 <body>
   <h3 class="text-left mb-3">เปลี่ยนข้อมูลผู้ใช้</h3>
   <form method="post" action="save_profile.php">
     <div class="form-group">
       <label>ID :</label>
       <input disabled class="form-control" type="text" value="<?PHP echo $ObjResult['user_id']; ?>" required/>
     </div>
     <div class="form-group">
       <label>Name:</label>
       <input class="form-control" type="text" name="name" id="name" value="<?PHP echo $ObjResult['name']; ?>" required/>
  </div>
  <div class=" form-group">
       <label>Username:</label>
       <input disabled class="form-control" type="text" value="<?PHP echo $ObjResult['username']; ?>" required/>
     </div>
     <div class="form-group">
       <label>Pass:</label>
       <input class="form-control" type="password" name="pass" id="pass" value="<?PHP echo $ObjResult['password']; ?>" required/>
     </div>
     <div class="form-group">
       <label>ConfirmPass:</label>
       <input class="form-control" type="password" name="conpass" id="conpass" value="<?PHP echo $ObjResult['password']; ?>" required/>
     </div>
     <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
     <button type="Reset" class="btn btn-primary">เอาใหม่</button>
   </form>
 </body>

 </html>