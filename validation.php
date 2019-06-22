<?php
session_start();

$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

$db['default'] = array(
    'dsn'    => '',
    'hostname' => $cleardb_server,
    'username' => $cleardb_username,
    'password' => $cleardb_password,
    'database' => $cleardb_db
);

$con=mysqli_connect('db['hostname']', 'db['username']', 'db['password']');



mysqli_select_db($con, 'dbname=db['database']');
$name=$_POST['name'];
$username=$_POST['user'];
$pass=$_POST['password'];


$s="select * from usertable where username= '$username' && password='$pass' ";

$result=mysqli_query($con, $s);

$num=mysqli_num_rows($result);


if($num == 1){
  header('location:home.php');
  $_SESSION['username']=$username;
}
else{
  header('location:login.php'); }
 ?>
