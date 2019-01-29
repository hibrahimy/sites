<?php
session_start();
if(!isset($_SESSION['success'])){
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'login.php';
  header("Location: http://$host$uri/$extra");
}

?>
<!DOCTYPE html>
<html lang="en" dir='ltr'>
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
  </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"> سیستم درج معلومات کرایه نشین ها</a>
  <button class="navbar-toggler" type="button" 
  data-toggle="collapse" data-target="#navbarSupportedContent" 
  aria-controls="navbarSupportedContent" aria-expanded="false"
   aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?p=list">لیست کرایه نشین ها 
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">معلومات</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          سایرخدمات
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?p=calc">محاسبه بل ها</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">خروج ازسیستم</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method='post' action='?p=search'>
      <input name="searchVal" class="form-control mr-sm-2" type="search" placeholder="شماره تذکره و یانام مشتری" aria-label="Search">
      <select name="tbl_" id="searchInput" class="form-control">
        <option selected value="tenants">کرایه نشین</option>
        <option value="bills_water">بل های اب</option>
        <option value="bills_waste">بل های فاضلاب</option>
      </select>
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">جستجو</button>
    </form>
  </div>
</nav>

<div class='content'>
  <div class="container">
  <div class="row">
  <!--.col-,col-sm,col-md-,col-lg-,col-xl-->
    <div class=".col" style="border:1px solid #DFD;margin:4px;">
      <hr>
      <h5 class='h5'>مینوی خدمات سیستم</h5>
      <hr>
      <li class="navbar-nav mr-auto nav-item btn-primary" style='margin-bottom:2px;'>
        <a class="nav-link" href="?p=addl"style="color:#FFF;padding:1px;text-align:center;">درج کرایه نشینه ها</a>
      </li>
      <hr>
      <li class="navbar-nav mr-auto nav-item btn-primary">
        <a class="nav-link" href="?p=shw"style="color:#FFF;padding:1px;text-align:center;">لست بل های اب</a>
      </li>
      <hr>
      <li class="navbar-nav mr-auto nav-item btn-primary">
        <a class="nav-link" href="?p=shwas"style="color:#FFF;padding:1px;text-align:center;">لست بل های فاضلاب</a>
      </li>
    </div>
    <div class="col-md"  style='border-left: 1px solid #BFB;border-right: 1px solid #BFB;'>
      
      <?php
      
        if(isset($_GET['p']) && $_GET['p']=='addl'){
          include("addTenants.php");
        }
        elseif(isset($_GET['p']) && $_GET['p']=='calc'){
          include("calcBills.php");
        }
        elseif(isset($_GET['p']) && $_GET['p']=='search'){
          include("search.php");
        }
        elseif(isset($_GET['p']) && $_GET['p']=='water'){
          include("water.php");
        }
        elseif(isset($_GET['p']) && $_GET['p']=='shw'){
          include('showWaterBills.php');
        } 
        elseif(isset($_GET['p']) && $_GET['p']=='shwas'){
          include('showWasteBills.php');
        } 
        elseif(isset($_GET['p']) && $_GET['p']=='delb'){
          include('delBill.php');
        } 
        elseif(isset($_GET['p']) && $_GET['p']=='prb'){
          include('prBill.php');
        } 
        elseif(isset($_GET['p']) && $_GET['p']=='del' ){
          include("remove.php");
        }
        elseif(isset($_GET['p']) && $_GET['p']=='list' ){
          include("list.php");
        }
        else{
          include("main.php");
        }

      ?>
      
    </div>
    <!-- <div class=".col" style="border-bottom:1px solid #333;">
      <br />
      اعلانات
    </div> -->
  </div>
</div>
  
  </div> <!--Container Ends-->
  </div> <!--End of Content-->


<footer>
  <div class='container badge-success' style='padding:32px;'>
    <small >Powered by: H.Ibrahimy</small>
  </div>
</footer>

<body>
  
</body>
</html>