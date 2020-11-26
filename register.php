  <html lang="en">
  <head>
    <title>ร้านพฤกษา</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
    <body>
      <div class="container h-100 d-flex justify-content-center">
        <div class="jumbotron my-auto">
          <h1>ร้านพฤกษา</h1>
          <h2>สมัครสมาชิก</h2>
          <form method="post" action="checkregister.php">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="Uname" name="Uname" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="Pass" name="Pass" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="Reset" class="btn btn-info">Reset</button>
          </form>
        </div>
     </div>
    </body>
  </html>
