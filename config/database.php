<?php

// to config please fill #1,#2,#3
//#1
define("ServerHOST",'localhost');
//#2
define("ServerUSER",'root');
//#3
define("ServerPASS",'');
//#4 leave this anyname to create new database with default inserted data 
define("ServerDATABASE",'mydb_phpv2');



$dbpdo = new PDOdatabaseconfig(ServerHOST,ServerUSER,ServerPASS,ServerDATABASE);


if( $dbpdo->errorCode == 1049){ // if database desn't exist create new one
$sql = file_get_contents('models/database_prophp.sql');
$dbpdo->serverQuery("create database if not exists ".ServerDATABASE."; use ".ServerDATABASE.";".$sql);
$dbpdo = new PDOdatabaseconfig(ServerHOST,ServerUSER,ServerPASS,ServerDATABASE);
}
if($dbpdo->error == 1 ){
echo $dbpdo->getMessage();
echo "<br><b>Check config of database  on this directory:  config -> database.php</b>";
echo "<br>Code:".$dbpdo->errorCode;
exit();
}



if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    $id = 0;
}
$userdata = $dbpdo->queryFetch("SELECT * from `users` WHERE id = :id limit 1",[":id"=>$id]);
$_SESSION = $userdata; 
if(is_numeric($userdata['id'])){
    $_SESSION['isonline'] = 1;
}
