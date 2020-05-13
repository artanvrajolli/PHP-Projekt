<?php 
if(isset($_POST['signup'])){
 $msg = "";

 $error = 0;
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$username = str_replace("$","",$username); // str_replace
if($username[0] == ' '){
    $username = substr($username, 1); // remove ' ' or this can be done with trim
}

if($email == ''){
    $msg = '<div class="error">Empty email is not allowed!</div>';
    $error = 1;
}else if($username == ''){
    $msg = '<div class="error">Empty username is not allowed!</div>';
    $error = 1;
}else if($password == ''){
    $msg = '<div class="error">Empty password is not allowed!</div>';
    $error = 1;
}else if(strlen($username) > 30){
    $msg = '<div class="error">Username longer than 30 characters is not allowed!</div>';
    $error = 1;
}else if(strlen($password) < 8){
    $msg = '<div class="error">Password less than 8 characters is not allowed!</div>';
    $error = 1;
}else if(!preg_match('/^[a-zA-Z\d_\-]{2,30}$/', $username)){
    $msg = '<div class="error">Username should only have letters,digits and "_" or "-"</div>';
    $error = 1;
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = '<div class="error">Wrong format of email!</div>';
    $error = 1;
}
$user_editer_info = $dbpdo->queryFetch("SELECT * from users WHERE (username=:username or email=:email) limit 1",[":username"=>$username,":email"=>$email]);

if($user_editer_info['username'] == $username){
    $msg = '<div class="error">This Username is taken</div>';
    $error = 1;
}elseif($user_editer_info['email'] == $email){
    $msg = '<div class="error">This Email is taken</div>';
    $error = 1;
}



if($error == 0){
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$params = [
":username"=>$username,
":email"=>$email,
":hashedpassword"=>$hashed_password
];
$dbpdo->executeQuery("INSERT INTO `users` (`username`, `email`,`password`) VALUES (:username, :email, :hashedpassword)",$params);

$msg = '<div class="success">Your account has been created!</div>';

}
}

?>
