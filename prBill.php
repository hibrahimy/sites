<?php

include('config.php');

  if(isset($_GET['pg'])){
    $page = "bills_" . $_GET['pg'];
    $id = $_GET['id'];
    $selqs= $con->query("SELECT * FROM `$page` WHERE `id` = $id");
    $reqs = $selqs->fetch_assoc();
  }else{

  }
  if(isset($_POST['paidbill'])){
    $idh = $_POST['idh'];
    $UPq = "UPDATE `$_POST[page]` SET `paid`=1 WHERE `id`=$idh";
    $con->query($UPq);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '?p=shw';
    //echo  $host . $uri . $extra;
    header("Location: http://$host$uri/$extra");
  }

?>

<div class="card">
  <h5 class="card-header">مشخصات بل</h5>
  <div class="card-body">
    <h5 class="card-title">مشخصات بل کرایه نشین</h5>
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active"><span class="font-weight-bold">اسم کرایه نشین</span> | <?php echo $reqs['fname'];?></a>
        <a href="#" class="list-group-item list-group-item-action"><span class="font-weight-bold">شماره تذکره کرایه نشین</span> | <?php echo $reqs['nid'];?></a>
        <a href="#" class="list-group-item list-group-item-action"><span class="font-weight-bold">شماره اپارتمان کرایه نشین</span> | <?php echo $reqs['appnum'];?></a>
        <a href="#" class="list-group-item list-group-item-action"><span class="font-weight-bold">دوره بل</span> | <?php echo $reqs['term'];?></a>
        <a href="#" class="list-group-item list-group-item-action disabled"><span class="font-weight-bold">تاریخ صدوربل </span> | <?php echo $reqs['timestamp'];?></a>
      </div>
    <form action="?p=prb&pg=waste&id=<?php echo $_GET['id'];?>" method="post">
      <mat-form-field>
        <input matInput  name='paidbill' class="btn btn-success" type="submit" value="بل پرداخت شده">
        <input matInput  name='idh' type="hidden" value="<?php echo $reqs['id'];?>">
        <input matInput  name='page' type="hidden" value="<?php echo "bills_" . $_GET['pg'];?>">
      </mat-form-field>
      <mat-form-field>
        <a href="?p=list" class="btn btn-danger"  >انصراف</a>
      </mat-form-field>
    </form>
  </div>
</div>