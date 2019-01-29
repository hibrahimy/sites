<?php
include('config.php');
if(isset($_POST['search'])){
  $tblName = $_POST['tbl_'];
  $searchVal = $_POST['searchVal'];
  $search_q = "SELECT * FROM `$tblName` 
  WHERE `nid` LIKE '%$searchVal%' OR `fname` LIKE '%$searchVal%' ";
  $res_qu = $con->query($search_q); 
}else{
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '?p=list';
  header("Location: http://$host$uri/$extra");
}

?>
<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>نتیجه جستجواز همه سیستم</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">اسم مکمل</th>
      <th scope="col">شماره تذکره</th>
      <th scope="col">شماره اپارتمان</th>
      <th scope="col">تعدادنفر</th>
      <th scope="col">تعداد روز</th>
      <th scope="col">مقدارپرداخت</th>
      <th scope="col">دوره</th>
      <th scope="col">تاریخ صدوربل \ورود رایه نشین</th>
    </tr>
  </thead>
  <tbody>
  <?php

  
  while($result = $res_qu->fetch_assoc()):
    echo "<tr>
      <td>$result[fname]</td>
      <td>$result[nid]</td>
      <td>$result[appnum]</td>
      <td>$result[persons]</td>
      <td>$result[days]</td>
      <td>$result[payment] اففانی</td>
      <td>$result[term]</td>
      <td>$result[timestamp]</td>
    </tr>";
  endwhile;
  ?>


    <!-- <td>
    <?php 
      // if($result[paid]==1)
      //   echo "بلی";
      // else
      //   echo "نخیر";  
      // echo "</td>";
    ?> -->
  
  </tbody>
</table>