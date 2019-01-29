<?php
include('config.php');
$con->query('SET CHARACTER SET utf8');
$q = "SELECT * FROM `tenants` WHERE `status`=1";
$runq = $con->query($q);


$waterbill = $con->query("SELECT max(term) AS `trms` from bills_water")->fetch_assoc()['trms'];
if($waterbill!=0)
$water = $con->query("SELECT `fromdate`,`todate` FROM `bills_water` WHERE `term`=$waterbill")->fetch_assoc();


$wastebill = $con->query("SELECT max(term) AS `trms` from bills_waste")->fetch_assoc()['trms'];
if($wastebill!=0)
  $waste = $con->query("SELECT `fromdate`,`todate` FROM `bills_waste` WHERE `term`=$wastebill")->fetch_assoc();

?>

<div class="bs-example">
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong></strong> <?php echo "ازتاریخ $water[fromdate] \t" . " الی تاریخ $water[todate] بل اب محاسبه گردیده است ودوره بل است $waterbill"; ?> 
  </div>
</div>

<div class="bs-example">
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong></strong> <?php echo "ازتاریخ $waste[fromdate] \t" . " الی تاریخ $waste[todate] بل فاضلاب محاسبه گردیده است و دوره بل $wastebill است"; ?> 
  </div>
</div>

<?php

if(isset($_POST['billdates'])){
  $fromdate = $_POST['fromdate'];
  $todate   = $_POST['todate'];
  $q1 = "SELECT SUM(`pnumber`) AS `tpnum` FROM `tenants` WHERE `status`=1";
  $perPerson = $con->query($q1);

  $totalPerson = $perPerson->fetch_assoc()['tpnum'];
  while($result = $runq->fetch_assoc()):
    $days=0;
    if(($fromdate - $result['indate']) < 0){ // if He comes after start of bill date
      $days = round((strtotime($todate)- strtotime($result['indate']))/86400);

    }elseif(($result['outdate'] - $todate) < 0){// IF he lefts house before end date of a bill
      $days = round((strtotime($result['outdate']) - strtotime($fromdate))/86400);
    }else{
      $days = round((strtotime($todate) - strtotime($fromdate))/86400);
    }

    $percentage = ($result['pnumber']*100)/$totalPerson;
    $percentage = round($percentage);

    $insertq = "UPDATE `tenants` SET `days` = $days, `p_perce`= $percentage,
    `fromdate`='$fromdate', `todate`='$todate' WHERE `id`= $result[id];";
    $billsrun = $con->query($insertq);
    
  endwhile;

  $q4 = "SELECT SUM(`days`) AS dys FROM `tenants` WHERE `status`=1";
  $perPerson = $con->query($q4);

  $totalDays = $perPerson->fetch_assoc()['dys'];
  
  $q5 = "SELECT * FROM `tenants` WHERE `status`=1";
  $qr = $con->query($q5);

  while($result = $qr->fetch_assoc()):
    $perDays = ($result['days']*100)/$totalDays;
    $perDays = round($perDays);

    $insertq = "UPDATE `tenants` SET `d_perce`= $perDays,
    `t_perce` = $result[p_perce]+$perDays
     WHERE `id`= $result[id];";
    $billsrun = $con->query($insertq);
    
  endwhile;

  $con->query('SET CHARACTER SET utf8');
  $q = "SELECT * FROM `tenants` WHERE `status`=1";
  $runq = $con->query($q);
  print_r($con->error);
}

if(isset($_POST['calcs'])){
  $money = trim($_POST['money']);
  $dy = "SELECT SUM(t_perce) AS tp FROM `tenants` WHERE `status`=1";
  $tdy = $con->query($dy);
  $tdy = $tdy->fetch_assoc()['tp'];
  
  $r = "SELECT * FROM `tenants` WHERE `status`=1";
  $rr = $con->query($r);
  
  while($re = $rr->fetch_assoc()):
    $pay = round(($money/$tdy)*$re['t_perce']);
    $con->query('SET CHARACTER SET utf8');

    $payed = "UPDATE `tenants` SET `payment`=$pay WHERE `id`= $re[id];";
    $con->query($payed);

    $host1  = $_SERVER['HTTP_HOST'];
    $uri1   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra1 = '?p=calc&success';
    // echo "<a href='http://$host$uri/$extra' >برگشت به صفحه اصلی</a>";
    header("Location: http://$host1$uri1/$extra1");

  endwhile;
  // $con->query('SET CHARACTER SET utf8');
  // $q = "SELECT * FROM `tenants` WHERE `status`=1";
  // $runq = $con->query($q);
  
}

if(isset($_POST['rec_bills'])){
  if(!empty($_POST['term'])&&!empty($_POST['reason'])){
  $term = $_POST['term'];
  $reason = $_POST['reason'];
  $comments = $_POST['comments'];
  
  $selq = "SELECT * FROM `tenants` WHERE `status`=1";
  $con->query('SET CHARACTER SET utf8');
  $tenantstbl = $con->query($selq);

  while($tenant=$tenantstbl->fetch_assoc()):

    $bills = $con->query("SELECT * FROM `$reason` WHERE `term`=$term AND `nid`='$tenant[nid]'");
    if($bills->fetch_all()==null){
      $insert_Q = "INSERT INTO `$reason`(`fname`,`nid`,`appnum`,`fromdate`,`todate`,`comments`,`days`,`persons`,
      `p_perce`,`d_perce`,`t_perce`,`payment`,`paid`,`term`)
      VALUES ('$tenant[fname]','$tenant[nid]',$tenant[appnum],'$tenant[fromdate]','$tenant[todate]','$comments',
      $tenant[days],$tenant[pnumber],$tenant[p_perce],$tenant[d_perce],$tenant[t_perce],
      $tenant[payment],0,$term)";
    $con->query('SET CHARACTER SET utf8');
      $con->query($insert_Q);
      
      // $host  = $_SERVER['HTTP_HOST'];
      // $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      // $extra = '?p=calc&added';
      // header("Location: http://$host$uri/$extra");

    }else{
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '?p=calc&failed';
      header("Location: http://$host$uri/$extra");
    }

    


  endwhile;
  
 
  //  print_r($checks->fetch_all());
  //   $que_tenants = "SELECT * FROM `tenants`";
  //   $res_sydb = $con->query($que_tenants);
  //   $errors = [];
  //   while($result = $res_sydb->fetch_assoc()):
  //   $ins_query = "INSERT INTO `$reason`(`fname`, `nid`, `appnum`, `days`,
  //   `persons`, `payment`, `paid`, `term`) 
  //   VALUES ('$result[fname]','$result[nid]',$result[appnum],$result[days],
  //   $result[pnumber],$result[payment],0,$term)";
  //   $con->query($ins_query);
  // endwhile;
  // $host  = $_SERVER['HTTP_HOST'];
  // $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  // $extra = '?p=calc&succ';
  // header("Location: http://$host$uri/$extra");
}else{
  // // Please fill both inputs trm and reason
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '?p=calc&failed';
  header("Location: http://$host$uri/$extra");
  // echo "http://$host$uri/$extra";
}
}
?>
<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>محاسبه بل های کرایه نشین ها</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ای دی</th>
      <th scope="col">اسم مکمل</th>
      <th scope="col">شماره اپارتمان</th>
      <!-- <th scope="col">تعدادنفر</th> -->
      <th scope="col">فیصدی تعدادنفر</th>
      <th scope="col">فیصدی تعدادروز</th>
      <th scope="col">مجوعه فیصدیها</th>
      <th scope="col">نوعیت بل</th>
      <th scope="col">مقدارقابل تادیه</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($result = $runq->fetch_assoc()):
    
    //       <td>$result[pnumber]</td>
    echo "<tr>
      <td>$result[id]</td>
      <td>$result[fname]</td>
      <td>$result[appnum]</td>

      <td>$result[p_perce]%</td>
      <td>$result[d_perce]%</td>
      <td>$result[t_perce]</td>
      <td>$result[reason]</td>
      <td>$result[payment] افغانی</td>
    </tr>";
  endwhile;
  ?>

<!-- <style>
table,tr,th,td {
  border:1px solid #333;


}
</style> -->
    <tr>
      <form action="?p=calc" method="post">
      <td colspan="2"><mat-form-field>
        <input matInput  class="form-control" type="date" name='fromdate' value="">
      </mat-form-field>
      </td>
      <td><- ازتاریخ</td>
      <td colspan="2"><mat-form-field>
        <input matInput  class="form-control" type="date"  name='todate' value="">
      </mat-form-field>
      </td>
      <td><- الی تاریخ</td>
      
      <td colspan="2" class="text-center">
      <mat-form-field>
        <input matInput  name='billdates' class="btn btn-success" type="submit" value="محاسبه تعداد روز">
      </mat-form-field>
      </td>
      </form>
    </tr>

    <tr>
      <form action="?p=calc" method="post">
      <td colspan="2"><mat-form-field>
        <input matInput class="form-control" name='money' placeholder="قیمت" value="">
      </mat-form-field>
      </td>
      <td>مقدارمصرف</td>
      

      
      <td colspan="2" class="text-center">
      <mat-form-field>
        <input matInput name='calcs' class="btn btn-primary" type="submit" value="محاسبه">
      </mat-form-field>
      </td>
      </form>
    </tr>
  <tr>
  <form action="?p=calc" method="post">
  <td ><mat-form-field>

  <input type='number' matInput id='trm' class="form-control" name='term' placeholder="دوره" value="" />
    <!-- <select matInput id='trm' class="form-control" name='term' placeholder="دوره" value="">
      <script>
        for (let i =1; i<21; i++){
          $('#trm').append("<option value="+ i +">" + i +"</option>");
        }
      </script>
    </select> -->
  </mat-form-field>
  </td>
  <td>دوره</td>

  <td ><mat-form-field>

  <input type='text' matInput id='comments' class="form-control" name='comments' placeholder="برج محاسبه" />
    <!-- <select matInput id='trm' class="form-control" name='term' placeholder="دوره" value="">
      <script>
        for (let i =1; i<21; i++){
          $('#trm').append("<option value="+ i +">" + i +"</option>");
        }
      </script>
    </select> -->
  </mat-form-field>
  </td>
  <td>برج محاسبه</td>

  <td ><mat-form-field>
    <select matInput id='reason' class="form-control" name='reason' placeholder="نوعیت بل">
     <option value="bills_waste">فاضلاب</option>
     <option value="bills_water">اب</option>
    </select>
  </mat-form-field>
  </td>
  <td>نوعیت بل</td>
    <td colspan="2" class="text-center">
      <mat-form-field>
      <input matInput name='rec_bills' class="btn btn-warning" type="submit" value="بل را ذخیره کنید">
      </mat-form-field>
    </td>
  </form>
  </tr>
  </tbody>
</table>
<?php
       if(isset($_GET['success'])){

       ?>
        <div class="bs-example">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> محاسبه موفقانه صورت گرفت.. .. . . . 
          </div>
        </div>
        
        <?php
      
       }elseif(isset($_GET['failed'])){
        ?>

        <div class="bs-example">
          <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> این بل قبلا درج شده است لطفا-- دوره  ویا  نوعیت بل را تغیردهید.. .. . . . 
          </div>
        </div>

        <?php
       }elseif(isset($_GET['succ'])){
        ?>

        <div class="bs-example">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> بل موفقانه واردسیستم گردید.. .. . . . 
          </div>
        </div>

        <?php
       }elseif(isset($_GET['added'])){
        ?>

        <div class="bs-example">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> بل موفقانه واردسیستم گردید.. .. . . . 
          </div>
        </div>

        <?php
       }
      
       ?>