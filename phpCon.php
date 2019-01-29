<?php
include('config.php');
if($con){
  $con->query('SET CHARACTER SET utf8');
  echo $con->error;
  if (isset($_POST['save'])){
    if(!empty($_POST['fname'])& !empty($_POST['nid'])&
     !empty($_POST['province']) & !empty($_POST['tel'])& !empty($_POST['email'])&
     !empty($_POST['indate']) & !empty($_POST['status'])& !empty($_POST['appnum'])){
      $fname = trim($_POST['fname']);
      $nid = trim($_POST['nid']);
      $province = $_POST['province'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $pnums = $_POST['pnums']; // Number
      $indate = $_POST['indate'];
      $outdate = date('Y-m-d');
      $status = $_POST['status']; // Number
      $appnum = $_POST['appnum']; // Number
      $con->query('SET CHARACTER SET utf8');
      $que = "INSERT INTO `tenants`(`fname`,`nid`,`province`,`tel`,`email`, `pnumber`,
       `indate`, `outdate`, `status`, `appnum`) 
      VALUES ('$fname','$nid','$province','$tel','$email',$pnums,'$indate','$outdate'
      ,$status,$appnum)";
      $con->query('SET CHARACTER SET utf8');
      $con->query($que);
      echo $con->error;
      
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '?p=addl&success';
      header("Location: http://$host$uri/$extra");
     }else{
      $host1  = $_SERVER['HTTP_HOST'];
      $uri1   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra1 = '?p=addl&failed';
      // echo "<a href='http://$host$uri/$extra' >برگشت به صفحه اصلی</a>";
      header("Location: http://$host1$uri1/$extra1");
    }
    
  }
 
}else{
  echo mysqli_error($con);
}


?>