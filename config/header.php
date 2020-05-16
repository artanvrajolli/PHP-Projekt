

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>

.shadow_b{

box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
pre{
  overflow-x: auto;
      white-space: pre-wrap;
      white-space: -moz-pre-wrap;
      white-space: -pre-wrap;
      white-space: -o-pre-wrap;
      word-wrap: break-word;
}
td{
border: 1px solid black;
}

a{
text-decoration: none;
}

    </style>
    <link rel="stylesheet" href="/views/css/msg.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>E-Learning web</title>
  </head>
  <body>
  <div class="container" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/dashboard">E-Learning</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<?php if($is_online == 1){
  $user_page = htmlentities($_SESSION['username']);
  ?>
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard"><i class="fas fa-laptop-house"></i> Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/profile/<?=$user_page?>"><i class="fas fa-user-circle" style="color: #22b0c6;"></i> My Profile</a>
      </li>
      <?php 
      if($_SESSION['is_admin'] == 1){ //this is for testing purpurse for everyone to be admin if you want to enbale admin if($_SESSION['is_admin'] == 1)
        ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-toolbox" style="color:#e58c8c;"></i> Admin Panel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <?php
            $total_users = $dbpdo->getRows("SELECT id from users");
            $str = "All users";
            ?>
          <a class="dropdown-item" href="/admin-panel/users"><i class="fas fa-users"></i> <?php  printf("[%u] %s",$total_users,$str); ?></a>
          <a class="dropdown-item" href="/admin-panel/backup"><i class="fas fa-server"></i> Backup</a>
        </div>
      </li>
     <form class="form-inline my-2 my-lg-0" method="post" action="/admin-panel/users">
      <input class="form-control mr-sm-2" type="search" name="searchuser" placeholder="Username or Email" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="buttonsearch" type="submit">Search</button>
    </form>
   

<?php }
    
    if(!isset($_COOKIE['tempinc'])){
      $ipofuser = htmlentities($_SERVER['REMOTE_ADDR']);

      $url = 'http://api.weatherapi.com/v1/current.json?key=90b16f8a23a84f9eac3184917201005&q='.$ipofuser;
      
      $data = file_get_contents($url);
      $dataparsed = json_decode($data);
      
      
      $tempinc = $dataparsed->current->temp_c;
      $desctemp = $dataparsed->current->condition->text;
      $imagefortemp = $dataparsed->current->condition->icon;
      setcookie("tempinc", $tempinc, time()+1*60*60,'/');
      setcookie("desctemp", $desctemp, time()+1*60*60,'/');
      setcookie("imagefortemp", $imagefortemp, time()+1*60*60,'/');
      }else{
        $tempinc = ($_COOKIE['tempinc']); // load cookie
        $desctemp = ($_COOKIE['desctemp']);
        $imagefortemp = ($_COOKIE['imagefortemp']);
      }
      ?>
      <img style="
    height: 40px;
    padding: 0px;
    width: 40px;
    " src="<?=$imagefortemp?>"><?=$tempinc?>&#176;C
      <?php
         }else{?>
    <li class="nav-item active">
        <a class="nav-link" href="/login">Login<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
      
  <?php }
  if($is_online == 1){?>
</ul>
        <a class="nav-link" href="/logout" tabindex="-1" ><i class="fas fa-sign-out-alt "></i> Logout</a>
    
  <?php } ?>
</nav>
<?php
$msg = '';
?>
