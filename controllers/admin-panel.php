<?php
class userinfo{
    private $id;
    private $username;
    private $email;
    private $signupdate;
    private $last_online;
    private $search;

    function setId($id){
        $this->id = $id;
    }
    function setUsername($username){
        $this->username = $username;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setSignUpdate($signupdate){
        $this->signupdate = $signupdate;
    }
    function setLast_Online($last_online){
        $this->last_online = $last_online;
    }

    function getId(){
        return $this->id;
    }
    function getUsername(){
        return $this->username;
    }
    function getEmail(){
        return $this->email;
    }
    function getSignUpdate(){
        return $this->signupdate;
    }
    function getLast_Online(){
        return $this->last_online;
    }

}

class user_main_function{
    function hydrateCon($user, $datas){
        $user->setId($datas['id']);
        $user->setUsername($datas['username']);
        $user->setEmail($datas['email']);
        $user->setSignUpdate($datas['register_date']);
        $user->setLast_Online($datas['last_online']);
        return $user;
    }
}


class user_toshow extends user_main_function {
    private $databaseTools;
    public function __construct($databaseTools){
        $this->databaseTools = $databaseTools;
    }
    public function getAllUsers($start = 0,$search = ''){
        if($search != ''){
            $this->search = " WHERE username LIKE '%$search%' or email LIKE '%$search%' ";
            $end = 1000;
        }else{
            $this->search = "";
            $end = 10;
        }

$results = $this->databaseTools->QueryFetchArrayAll("SELECT id,username,email,register_date,last_online FROM users $this->search order by id ASC limit $start,$end");      
          $users = [];
        foreach ($results as $result) {
            $one_user = new userinfo();
            $one_user = $this->hydrateCon($one_user, $result);
            array_push($users, $one_user);
        }
        return $users;
    }


    public function getNumUsers(){
        return $this->databaseTools->getRows("SELECT id from users  $this->search ");
    }



}

if(isset($_POST['tdelete'])){
    $id = $_POST['tid'];
$dbpdo->executeQuery("DELETE from users where id=:id",[":id"=>$id]);
header("location: /admin-panel/users");

}elseif(isset($_POST['tsubmit'])){
    $sqlquery = "";
    $error = 0;
    $id = $_POST['tid'];
    $username = $_POST['tusername'];
    $email = $_POST['temail'];
    
    if(isset($_POST['tis_admin'])){
        $is_admin = 1;
    }else{
        $is_admin = 0;
    }
    

    if($username == '' || $email == '' || !is_numeric($is_admin)){
        $msg = '<div class="alert alert-danger" role="alert">
        All field should be not empty!
      </div>';
        $error = 1;
    }else if(!preg_match('/^[a-zA-Z\d_\-]{2,30}$/', $username)){
        $error = 1;
        $msg = '<div class="alert alert-danger" role="alert">Wrong format of username!</div>';
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = '<div class="alert alert-danger" role="alert">Wrong format of email!</div>';
        $error = 1;
    }

    $user_editer = $dbpdo->queryFetch("SELECT * from users WHERE username=:username and id!=:id limit 1",[":username"=>$username,":id"=>$id]);

        
    if($user_editer['username'] === $username){
        $msg = '<div class="alert alert-danger" role="alert">This username exist!</div>';
        $error = 1;
    }else if($user_editer['email'] === $email){
        $msg = '<div class="alert alert-danger" role="alert">This username exist!</div>';
        $error = 1;
    }


    if($error == 0){
        
        if(isset($_POST['tpassword']) && !empty($_POST['tpassword'])){
            $hashed_password = password_hash($_POST['tpassword'], PASSWORD_DEFAULT);
            $params = [
            ":id"=>$id,
            ":username"=>$username,
            ":email"=>$email,
            ":hashedpassword"=>$hashed_password,
            ":is_admin"=>$is_admin
            ];
            $dbpdo->executeQuery("Update users SET username=:username,email=:email,password=:hashedpassword,is_admin=:is_admin WHERE id=:id",$params);
        }else{
            $params = [
                ":id"=>$id,
                ":username"=>$username,
                ":email"=>$email,
                ":is_admin"=>$is_admin
                ];
                $dbpdo->executeQuery("Update users SET username=:username,email=:email,is_admin=:is_admin WHERE id=:id",$params);
           
        }
        $msg= '<div class="alert alert-success" role="alert">User is updated!</div>';
    }
      
}elseif(isset($_POST['savetotext'])){
    $error = 0;
    $selector= [];

    if(isset($_POST['txtid'])){
        $selector[] =  'id';
    }
    if(isset($_POST['txtusername'])){
        $selector[] = 'username';
    }
    if(isset($_POST['txtemail'])){
        $selector[] = 'email';
    }
    if(isset($_POST['txtpassword'])){
        $selector[] = 'password';
    }
    if(isset($_POST['txtregister'])){
        $selector[] = 'register_date';
    }
    if(isset($_POST['txtlast_online'])){
        $selector[] = 'last_online';
    }
    if(isset($_POST['txtid'])){
        $selector[] = 'id';
    }
// $_POST['spliterwith']
    if(preg_match('/\|\/\%\#\!\$/',$_POST['spliterwith'])){
        $spliter = $_POST['spliterwith'];
    }else{
        $spliter = '|';
        
    }

$allselector = implode(",", $selector);


if(count($selector) == 0){
$msg = '<div class="alert alert-danger mx-auto" role="alert">
   Something should be selected!
 </div>';
 $error = 1; 
}

if($error == 0){
$get_users = $dbpdo->QueryFetchArrayAll("Select $allselector From users order by id");
$link = "user_file/file".time().".txt";
$fp = fopen($link, "w");
foreach($get_users as $row_txt){
    $output = [];
    foreach($row_txt as $one_word){
        $output[] = $one_word;
    }
    $alloutput = implode($spliter, $output);
fwrite($fp, $alloutput.PHP_EOL);
}
fclose($fp);
$msg = '<div class="alert alert-primary mx-auto" role="alert">
You file has been created! <a href="/'.$link.'" class="btn btn-primary" download>Download</a>
</div>';
}



}elseif(isset($_POST['buttonsearch'])){ // buttonsearch  // searchuser
    $search = $_POST['searchuser'];
    if(isset($partpage[3]) && is_numeric($partpage[3]) && $partpage[3] > 0){
        $page = $partpage[3];
       }else{
        $page = 0;
       }
       
       $ten_users_load_class = new user_toshow($dbpdo); // new class for users to show
       $ten_users = $ten_users_load_class->getAllUsers($page,$search); // get 10 users at the time
       $numtotalUsers = $ten_users_load_class->getNumUsers(); // get total of users
       
        $Numpages = ceil($numtotalUsers/10);
        $thispage = floor($page/10);
}else{
    // page numbers
if(isset($partpage[3]) && is_numeric($partpage[3]) && $partpage[3] > 0){
    $page = $partpage[3];
   }else{
    $page = 0;
   }
   
   $ten_users_load_class = new user_toshow($dbpdo); // new class for users to show
   $ten_users = $ten_users_load_class->getAllUsers($page); // get 10 users at the time
   $numtotalUsers = $ten_users_load_class->getNumUsers(); // get total of users
   
    $Numpages = ceil($numtotalUsers/10);
    $thispage = floor($page/10);
}








 ?>