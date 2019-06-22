<?php
require_once 'init.php';

if(isset($_GET['item'])){
    $item=$_GET['item'];

    $doneQuery=$cdb->prepare("
      DELETE FROM todo
      WHERE id=:item AND usrname=:usrname
    ");

    $doneQuery->execute([
      'item'=>$item,
      "usrname"=>$_SESSION['username']
      ]);

}
header("location: home.php")
 ?>
