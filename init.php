<?php
session_start();


//Get Heroku ClearDB connection information
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

$cdb=new PDO('mysql:dbname=db['database'];host=db['hostname']', 'db['username']', 'db['password']');

if(!isset($_SESSION['username'])){
  header('location:login.php');
}
 ?>
