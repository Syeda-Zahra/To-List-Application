<?php
require_once 'init.php';

if(isset($_GET['as'], $_GET['item'])){
  $as =$_GET['as'];
  $item=$_GET['item'];

  switch($as){
    case 'done':
      $doneQuery=$cdb->prepare("
        UPDATE todo
        SET done=0
        WHERE id=:item AND usrname=:usrname
      ");
        $doneQuery->execute([
          'item'=>$item,
          "usrname"=>$_SESSION['username']
        ]);

      break;
  }
}
header("location: home.php")
 ?>
