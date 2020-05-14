<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['change_password'])){
    $error = 0;

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$c_new_password = $_POST['c_new_password'];


if(!password_verify($old_password,$_SESSION['password'])){
    $msg = '<div class="bar warn"><i class="fas fa-exclamation-triangle"></i> Your current password is not maching!</div>';
    $error = 1;
}else if($new_password !== $c_new_password){
    $msg = '<div class="bar warn"><i class="fas fa-exclamation-triangle"></i>New password with confirmed password aren\'t maching!</div>';
    $error = 1;
}else if(strlen($new_password)  < 8){
    $msg = '<div class="bar warn"<i class="fas fa-exclamation-triangle"></i> Your New password is weak should be longer than 8 characters!</div>';
    $error = 1;
}

 if($error == 0){


    $msg = '<div class="bar success"><i class="far fa-check-circle"></i> You password has changed</div>';
    $params = [
        ":hashedpassword"=>password_hash($new_password, PASSWORD_DEFAULT),
        ":id"=>$_SESSION['id']
        ];
        $dbpdo->executeQuery("UPDATE users set `password`=:hashedpassword where id = :id limit 1",$params);

 }




}else if(isset($_POST['send_button']) && $is_online == 1){

$error = 0;
$iduser = $_POST['send_id'];
$subject = htmlentities($_POST['send_subject']);
$content = htmlentities($_POST['send_content']);

$senderinfo = $dbpdo->queryFetch("SELECT * from users where id=:id",[":id"=>$iduser]);

if(!is_numeric($iduser)){
    $msg = '<div class="alert alert-danger" role="alert">
    Wrong user id!!!
         </div>'; 
    $error = 1;
}elseif($subject == ''){
    $msg = '<div class="alert alert-danger" role="alert">
    Subject needed to be fill to send!
         </div>'; 
    $error = 1;
}elseif($content == ''){
    $msg = '<div class="alert alert-danger" role="alert">
    Content needed to be fill to send!
         </div>'; 
         $error = 1;
}
if($error == 0){

require 'config/lib/PHPMailer/src/Exception.php';
require 'config/lib/PHPMailer/src/PHPMailer.php';
require 'config/lib/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tt6131335.4a@gmail.com';                     // SMTP username
    $mail->Password   = 'att6131335.4A!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('e_learning@example.com', 'Message from '.$_SESSION['username']);
    $mail->addAddress($senderinfo['email'], $senderinfo['username']);     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = ($subject);
    $mail->Body    = BBCode($content);

    $mail->send();
    $msg = '<div class="alert alert-primary" role="alert">
    Message has been sent
  </div>';
   
} catch (Exception $e) {
    $msg = '<div class="alert alert-danger" role="alert">
    check config of mailer<br>
    Message could not be sent. Mailer Error: '.$mail->ErrorInfo.'
  </div>'; 
}


}


}




?>