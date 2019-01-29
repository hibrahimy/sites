
<?php

include('config.php');
$con->query('SET CHARACTER SET utf8');
$q = "SELECT * FROM `tenants`";
$runq = $con->query($q);

?>
<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>لست عمومی کرایه نشین ها</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">تذکره</th>
      <th scope="col">اسم مکمل</th>
      <th scope="col">شماره اپارتمان</th>
      <th scope="col">تعدادنفر</th>
      <th scope="col">تاریخ ورود</th>
      <th scope="col">تاریخ خروج</th>
      <th scope="col">روز</th>
      <th scope="col">اختیارات</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  // Update the checkout date with the current date.
  // $cdate=date('Y-m-d'); 
  // $qdate = "UPDATE tenants SET `outdate` = '$cdate'";
  // $con->query($qdate);
  
  $q1 = "SELECT SUM(`pnumber`) AS `tpnum` FROM `tenants`"; //WHERE `status`=1";
  $perPerson = $con->query($q1);
  
  $totalPerson = $perPerson->fetch_assoc()['tpnum'];
 
  while($result = $runq->fetch_assoc()):
    $days = round((strtotime($result['outdate']) - strtotime($result['indate']))/86400);
    
    $percentage = ($result['pnumber']*100)/$totalPerson;
    $percentage = round($percentage);

    $insertq = "UPDATE `tenants` SET `days` = $days, `p_perce`= $percentage WHERE `id`= $result[id];";
    $billsrun = $con->query($insertq);
    
    echo "<tr>
      <td>$result[nid]</td>
      <td>$result[fname]</td>
      <td>$result[appnum]</td>
      <td>$result[pnumber]</td>
      <td>$result[indate]</td>
      <td>$result[outdate]</td>
      <td>$days</td>
      <td>
      <a href='?p=del&id=$result[id]' style='color:red'>X</a>
      ---
      <a href='?p=pr&id=$result[id]'style='color:blue'>P</a>
      </td>
    </tr>";
  endwhile;
  $q5 = "SELECT * FROM `tenants`";
  $qr = $con->query($q5);
  
  $q4 = "SELECT SUM(`days`) AS dys FROM `tenants`"; //WHERE `status`=1";
  $perPerson = $con->query($q4);
  
  $totalDays = $perPerson->fetch_assoc()['dys'];
  while($result = $qr->fetch_assoc()):
    $perDays = ($result['days']*100)/$totalDays;
    $perDays = round($perDays);

    $insertq = "UPDATE `tenants` SET `d_perce`= $perDays,
    `t_perce` = $result[p_perce]+$perDays
     WHERE `id`= $result[id];";
    $billsrun = $con->query($insertq);
 
  endwhile;
  
  ?>
  
  </tbody>
</table>

<?php
       if(isset($_GET['success'])){

       ?>
        <div class="bs-example">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> کرایه نشین موفقانه ویرایش گردید.. .. . . . 
          </div>
        </div>
        
        <?php
      
       }elseif(isset($_GET['failed'])){
        ?>

        <div class="bs-example">
          <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> لطفا همه خانه های خالی را با معلومات دقیق خانه پری نمایید.. .. . . . 
          </div>
        </div>

        <?php
       }
      
       ?>