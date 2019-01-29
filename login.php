<?php
session_start();
if(isset($_POST['lgbtn']) && $_POST['success'] === "124000"){
$_SESSION['success'] = $_POST['success'];
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('config.php'); ?>
  <link rel="stylesheet" href="./bootstrap-4/css/bootstrap.css">
  <link rel="stylesheet" href="./bootstrap-4/css/bootstrap-grid.css">
  <link rel="stylesheet" href="./bootstrap-4/css/bootstrap-grid.css.map">
  <link rel="stylesheet" href="./bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="./bootstrap-4/css/bootstrap.css.map">
  <link rel="stylesheet" href="./bootstrap-4/css/bootstrap-grid.css.map">
  <script src="./js/jquery.js"></script>
  <script src="./bootstrap-4/js/bootstrap.js"></script>
  <script src="./bootstrap-4/js/bootstrap.min.js"></script>
  <script src="./bootstrap-4/js/bootstrap.js.map"></script>
  <script src="./bootstrap-4/js/bootstrap.bundle.js"></script>
  <?php include('phpCon.php') ?>
  <title>SEHI</title>
  <style>
    *{
      text-align:right;
    }
    body.jumbotron{
      background-color:#333;
    }
  </style>
</head>

<body class="jumbotron vertical-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">لطفا رمز ورود را واردکنید</h5>
            <form class="form-signin" method="post" action="?">

              <div class="form-label-group">
                <input type="password" id="inputPassword" name='success' class="form-control" placeholder="Password" required>
                <label for="inputPassword"></label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="lgbtn" type="submit">Sign in</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>