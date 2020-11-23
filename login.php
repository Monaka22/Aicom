<html lang="en">
  <head>
    <title>ร้านพฤกษา</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
    <body>
      <div class="container h-100 d-flex justify-content-center">
        <div class="jumbotron my-auto">
          <h1>ร้านพฤกษา</h1>
          <h3>Login</h3>
          <form method="post" action="checklogin.php">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="Uname" name="Uname">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="Pass" name="Pass">
            </div>
            <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
            <button type="Reset" class="btn btn-info">รีเซ็ท</button>
          </form>
        </div>
     </div>
    </body>
  </html>