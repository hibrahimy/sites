<?php
include('config.php');

if(isset($_GET['pg'])&&isset($_GET['id'])){

  $deletebill = $con->query("DELETE FROM `$_GET[pg]` WHERE `id` = $_GET[id]");

  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '?p=shwas&success';
  header("Location: http://$host$uri/$extra");

}else{
  echo "Sorry";
}


?>