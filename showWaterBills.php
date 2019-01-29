<?php
include('config.php');
$query_bills = "SELECT * FROM `bills_water`";
$res_qu = $con->query($query_bills);
?>
<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>بل های اب کرایه نشین ها</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">حالت بل</th>
      <th scope="col">اسم مکمل</th>
      <th scope="col">ازتاریخ</th>
      <th scope="col">الی تاریخ</th>
      <th scope="col">شماره اپارتمان</th>
      <th scope="col">تعدادنفر</th>
      <th scope="col">تعداد روز</th>
      <th scope="col">مقدارپرداخت</th>
      <th scope="col">دوره</th>
      <th scope="col">برج محاسبه</th>
      <th scope="col">تاریخ صدوربل</th>
      <th scope="col">اختیارات</th>
    </tr>
  </thead>
  <tbody>
  <?php

  
  while($result = $res_qu->fetch_assoc()):
    echo "<tr>";
    if($result[paid]==0){ 
      echo "<td class='bg-warning'>نپرداخته</td>" ;
    }
    else{
      echo "<td class='bg-success'>پرداخته</td>";
    }
     echo "<td>$result[fname]</td>
      <td>$result[fromdate]</td>
      <td>$result[todate]</td>
      <td>$result[appnum]</td>
      <td>$result[persons]</td>
      <td>$result[days]</td>
      <td>$result[payment] افغانی</td>
      <td>$result[term]</td>
      <td>$result[comments]</td>
      <td>$result[timestamp]</td>
      <td>
      <form method='GET' action='?p=delb&pg=waste&id=1'>
      <a href='?p=delb&pg=water&id=$result[id]' style='color:red'>X</a>
      ---
      <a href='?p=prb&pg=water&id=$result[id]'style='color:blue'>P</a>
      </form>
      </td>
    </tr>";
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
            <strong> . . . .  </strong> کرایه نشین موفقانه حذف گردید.. .. . . . 
          </div>
        </div>
        
        <?php
      
       }elseif(isset($_GET['failed'])){
        ?>

        <div class="bs-example">
          <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> خذف ناموفق.. .. . . . 
          </div>
        </div>

        <?php
       }
      
       ?>