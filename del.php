<?php
include('config.php');
if(isset($_POST)&& !empty($_POST)){
  $updated = $_POST;
  $updateQue = "UPDATE `tenants` SET `fname`='$updated[fname]',`nid`='$updated[nid]',
  `province`='$updated[province]',`tel`='$updated[tel]',`email`='$updated[email]',
  `pnumber`=$updated[pnums],`indate`='$updated[indate]',`outdate`='$updated[outdate]',
  `status`=$updated[status],`appnum`=$updated[appnum] WHERE `id`= $updated[id] ";
  $con->query('SET CHARACTER SET utf8');
  $done = $con->query($updateQue);
  if($done){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '?p=list&success';
    header("Location: http://$host$uri/$extra");
  }else{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '?p=list&failed';
    header("Location: http://$host$uri/$extra");
  }
}

?>