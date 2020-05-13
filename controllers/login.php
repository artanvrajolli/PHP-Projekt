<?php
if(isset($_POST['loginin'])){
$msg = '';
$error = 0;



$email_or_username = trim($_POST['email']);
$password = $_POST['password'];

if($email_or_username == "" || $password == ''){
 $msg = '<div class="error">Empty email or password is not allowed!</div>';
 $error = 1;
}

if($error == 0){
$userdata = $dbpdo->queryFetch("SELECT * from `users` WHERE (email=:email OR username=:username) limit 1",[":email"=>$email_or_username,":username"=>$email_or_username]);
if(password_verify($password, $userdata['password'])){
$_SESSION = $userdata; // update data to the user
$_SESSION['isonline'] = 1;
echo "<b><br>".htmlentities($_SESSION['username'])."<br></b>";

header("location: /dashboard");
}else{
	$msg = '<div class="error">Wrong password or username!</div>';
	session_destroy();
	$error = 1;
	
}
}
}

?>
