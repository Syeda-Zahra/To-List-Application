<?php
require_once 'init.php';

if(isset($_POST['name'])){
  $name=trim($_POST['name']);
  if(!empty($name)){
    $addedQuery=$db->prepare("
    INSERT INTO todo (itemname, usrname, done, created)
    VALUES(:itemname, :usrname, 0, NOW())
    ");

    $addedQuery->execute([
      'itemname'=>$name,
      'usrname'=>$_SESSION['username']
    ]);
  }
}
header('location: home.php');

?>
