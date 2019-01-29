<?php
include('config.php');
$con->query('SET CHARACTER SET utf8');
$q = "SELECT * FROM `sysdb` WHERE `status`=1";
$runq = $con->query($q);

if(isset($_POST)){
  $money = $_POST['money'];
  $dy = "SELECT SUM(t_perce) AS tp FROM `sysdb` WHERE `status`=1";
  $tdy = $con->query($dy);
  $tdy = $tdy->fetch_assoc()['tp'];
 
  $r = "SELECT * FROM `sysdb` WHERE `status`=1";
  $rr = $con->query($r);
  while($re = $rr->fetch_assoc()):
  $pay = round(($money/$tdy)*$re['t_perce']);

  $payed = "UPDATE `sysdb` SET `payment`=$pay WHERE `id`= $re[id];";
  $con->query($payed);

  endwhile;
  $con->query('SET CHARACTER SET utf8');
  $q = "SELECT * FROM `sysdb` WHERE `status`=1";
  $runq = $con->query($q);
  
}
?>
<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>محاسبه بل اب کرایه نشین ها</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ای دی</th>
      <th scope="col">اسم مکمل</th>
      <th scope="col">شماره اپارتمان</th>
      <th scope="col">تعدادنفر</th>
      <th scope="col">فیصدی تعدادنفر</th>
      <th scope="col">فیصدی تعدادروز</th>
      <th scope="col">مجوعه فیصدیها</th>
      <th scope="col">مقدارقابل تادیه</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($result = $runq->fetch_assoc()):
    
    echo "<tr>
      <td>$result[id]</td>
      <td>$result[fname]</td>
      <td>$result[appnum]</td>
      <td>$result[pnumber]</td>
      <td>$result[p_perce]%</td>
      <td>$result[d_perce]%</td>
      <td>$result[t_perce]</td>
      <td>$result[payment]</td>
    </tr>";
  endwhile;
  ?>
  </tbody>
  <tr><td>مقدارمصرف</td>
  <form action="?p=waste" method="post">
  <td><mat-form-field>
    <input matInput name='money' placeholder="قیمت" value="2300">
  </mat-form-field>
  </td>
  <td></td>
  <td>
  
  <mat-form-field>
    <input matInput name='calcs' class="btn btn-primary" type="submit" value="محاسبه">
  </mat-form-field>
  </form>
  </td>
  </tr>
</table>
