
<?php

include('config.php');

  if(isset($_GET['pg'])){
    $page = "bills_" . $_GET['pg'];
    $id = $_GET['id'];
    $selqs= $con->query("SELECT * FROM `$page` WHERE `id` = $id");
    $reqs = $selqs->fetch_assoc();
  }else{

  }
?>


<div class="card">
  <h5 class="card-header">حذف بل</h5>
  <div class="card-body">
    <h5 class="card-title">ایا میخواهید بل را خذف کنید؟</h5>
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active"><span class="font-weight-bold">اسم کرایه نشین</span> | <?php echo $reqs['fname'];?></a>
        <a href="#" class="list-group-item list-group-item-action"><span class="font-weight-bold">شماره تذکره کرایه نشین</span> | <?php echo $reqs['nid'];?></a>
        <a href="#" class="list-group-item list-group-item-action"><span class="font-weight-bold">شماره اپارتمان کرایه نشین</span> | <?php echo $reqs['appnum'];?></a>
        <a href="#" class="list-group-item list-group-item-action"><span class="font-weight-bold">دوره بل</span> | <?php echo $reqs['term'];?></a>
        <a href="#" class="list-group-item list-group-item-action disabled"><span class="font-weight-bold">تاریخ صدوربل </span> | <?php echo $reqs['timestamp'];?></a>
      </div>
    <a href='delete_bill.php?id=<?php echo $id."&pg=$page";?>' class="btn btn-danger">بلی</a>
    <a href="index.php" class="btn btn-primary">نخیر</a>
  </div>
</div>