<!DOCTYPE html>
<html lang="en">
<?php
include "conect.php";
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ร้านพฤกษา</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav style="background-color: #79B081;" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">ร้านพฤกษา</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="login.php">เข้าสู่ระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h4 class="my-4">ประเภทสินค้า</h4>
        <div class="list-group">
        <?php
            $strSQLc = "SELECT * FROM product_type where status = 1 ";
            $objQueryc = $mysqli->query($strSQLc);
            $numc = mysqli_num_rows($objQueryc);
            for($j=1;$j<=$numc;$j++)
            {
              $objResultc =  mysqli_fetch_assoc($objQueryc);
            ?>
              <a href="#" onclick="types(<?=$objResultc['product_type_id']?>)"  class="list-group-item text-dark"><?php echo $objResultc['product_type_name'] ?></a>
            <?php
            }
            ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row mt-4" id="product">
          <?php
            $strSQL = "SELECT * FROM product where status = 1 ";
            $objQuery = $mysqli->query($strSQL);
            $num = mysqli_num_rows($objQuery);
            for($i=1;$i<=$num;$i++)
            {
              $objResult =  mysqli_fetch_assoc($objQuery);
            ?>
              <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <img class="card-img-top" src="img/<?php echo $objResult['product_id']?>.jpg" alt="">
                <div class="card-body">
                  <h4 class="card-title">
                    <span href="#"><?php echo $objResult['product_name'] ?></span>
                  </h4>
                  <p class="card-text"><?php echo $objResult['product_detail'] ?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">
                  <h5><?php echo $objResult['product_price'] ?> บาท</h5></small>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer style="background-color: #79B081;" class="py-2 fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;ร้านพฤกษา 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    function types(id){
      $.ajax({
                url: "load_product_index.php",
                method: "POST",
                data: {
                    type_id: id
                },
                success: function(data) {
                    $('#product').html(data);
                    console.log(data)
                }
            });
    }
  </script>
</body>
</html>
