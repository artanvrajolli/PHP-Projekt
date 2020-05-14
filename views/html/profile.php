<?php

if(isset($partpage[2])){
$user_page = htmlentities($partpage[2]);
}else{
$user_page = htmlentities($_SESSION['username']);
}

$checkifthereisusername = $dbpdo->getRowsWithParma("SELECT id,username from users where username=:username",[":username"=>$user_page]);
if($checkifthereisusername == 0){
  header("location: /404");
  exit("This user doesn't exist!");
}
$userdata = $dbpdo->queryFetch("SELECT * from `users` WHERE username=:username limit 1",[":username"=>$user_page]);


 $total_posts = $dbpdo->getRows("SELECT * FROM `posts` where uid=".$userdata['id']);
 
?>

<div class="shadow_b border p-4 m-4 ">
<div class="row  mt-3" >
    <div class="col-md-3 border-bottom mr-4">Username:</div>
    <div class="col-md-3 border-bottom mr-4"><?=$userdata['username']?></div>
</div>
    <div class="row  " >
    <div class="col-md-3 border-bottom mr-4">Email:</div>
    <div class="col-md-3 border-bottom mr-4"><?=$userdata['email']?></div>
    </div>
    <div class="row  " >
    <div class="col-md-3 border-bottom mr-4">Register date:</div>
    <div class="col-md-3 border-bottom mr-4"><?=$userdata['register_date']?></div>
    </div>
    <div class="row  " >
    <div class="col-md-3 border-bottom mr-4">Last Online</div>
    <div class="col-md-3 border-bottom mr-4"><?=$userdata['last_online']?></div>
    </div>
    <?php
  if($_SESSION['username'] == $user_page){?>
    <div class="row  " >
    <div class="col-md-3 border-bottom mr-4">Password:</div>
    <div class="col-md-3 border-bottom mr-4 text-success">(<i class="fas fa-key"></i>Hashed and encrypted)</div>
  </div>
  <?php }?>
  <div class="row  " >
    <div class="col-md-3 border-bottom mr-4">Total posts:</div>
    <div class="col-md-3 border-bottom mr-4 text-info"><i class="fab fa-ioxhost"></i> <?=$total_posts?></div>
  </div>
  <?php
  if($_SESSION['username'] == $user_page && !isset($partpage[3])){?>
  <div class="col-md-10">
  <a href="/profile/<?=$_SESSION['username']?>/edit">
<button type="button" class="btn btn-secondary px-5 mt-1">Edit</button></a></div>
  <?php }
  if($_SESSION['username'] != $user_page && !isset($partpage[3]) ){?>
  <div class="col-md-10 mt-3">
  <a href="/profile/<?=$partpage[2]?>/send">
<button type="button" class="btn btn-secondary px-5 mt-1"><i class="fas fa-envelope-open-text"></i> Send Email</button></a></div>
  <?php }?>


</div>

<?php
if($userdata['username'] === $_SESSION['username'] && isset($partpage[3]) && $partpage[3] == "edit"){ // show edit and change password for only the owner
?>

<div class="row justify-content-center mt-5 mb-5 border shadow_b" >
<form method="post">
<?=$msg?>
  <div class="form-group">
  <h2> Change password</h2>
    <label for="exampleInputEmail1">Current Password</label>
    <input type="password" name="old_password" class="form-control">
    <small id="emailHelp" class="form-text text-muted">Password should be more than 8 characters</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="new_password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm new Password</label>
    <input type="password" name="c_new_password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="change_password" class="btn btn-primary">Change password</button>
</form>
<?php }else if(isset($partpage[3]) && $partpage[3] == "send"){
  

  ?>
  <div class="boder p-4 col-md-12 shadow_b p-3 mb-3 m-4">
  <?=$msg?>
  <h2>Send email to <?=$userdata['username']?></h2>
  <form method="posT">
  <input style="display:none" name="send_id" value="<?=$userdata['id']?>">
  <div class="form-group">
    <label >Subject</label>
    <input type="text" name="send_subject" class="form-control" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <div class="mb-1">
    <button class="btn btn-info ml-2" type="button" value="Bold" name="bold" onclick="add_bbcode('[b]text[/b]')" style="display:inline-block;" /><b>Bold</b></button>
							<button class="btn btn-info ml-2" type="button" value="Underline" name="underline" onclick="add_bbcode( '[u]text[/u]')" style="display:inline-block;" /><u>Underline</u></button>
							<button class="btn btn-info ml-2" type="button" value="Italic" name="italic" onclick="add_bbcode( '[i]text[/i]')" style="display:inline-block;" /><em>Italic</em></button>
							<button class="btn btn-info ml-2" type="button" value="Link" name="link" onclick="add_bbcode( '[url=http:\/\/url.com/]text[/url]')" style="50px;display:inline-block;" />Link</button>
							<button class="btn btn-info ml-2" type="button" value="Center" name="center" onclick="add_bbcode('[center]text[/center]')" style="display:inline-block;" />Center</button>
							<button class="btn btn-info ml-2" type="button" value="Image" name="image" onclick="add_bbcode('[img]URL[/img]')" style="display:inline-block;" />Image</button>
              <button class="btn btn-info ml-2" type="button" value="Size" name="size" onclick="add_bbcode('[size=5]text[/size]')" style="display:inline-block;" />Size</button>
              <button class="btn btn-info ml-2" type="button" value="Color" name="color" onclick="add_bbcode( '[color=red]text[/color]')" style="display:inline-block;" />Color</button>
              <button class="btn btn-info ml-2" type="button" value="Table" name="color" onclick="add_bbcode( '[table]\n[tr][td]data1[/td][td]data2[/td][/tr]\n[tr][td]data1[/td][td]data2[/td][/tr]\n[/table]')" style="display:inline-block;" />Table</button>
              <button class="btn btn-info ml-2" type="button" value="Code" name="code" onclick="add_bbcode( '[code] CODE [/code]')" style="display:inline-block;" />Code</button>
    </div>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="send_content" rows="5"></textarea>
  </div>


  <button type="submit" name="send_button" class="btn btn-primary">SEND</button>
</form>
<script>
function add_bbcode(tag){
		document.getElementById("exampleFormControlTextarea1").value = document.getElementById("exampleFormControlTextarea1").value + tag; 
    console.log("added:"+tag);
}
</script>
  </div>
 <?php
}else{?>
<div class="boder shadow_b p-3 mb-3">
<?php
  
  $this_user_data = $dbpdo->queryFetch("SELECT * from `users` WHERE username=:username limit 1",[":username"=>$user_page]);

  $list_post_10 = $dbpdo->QueryFetchArrayAll("Select * From posts where uid='".$this_user_data['id']."' order by date_created  DESC limit 10");

    foreach($list_post_10 as $list_post_one){
    ?>
    <a style="text-decoration: none;" href="/dashboard/<?=$list_post_one['pid']?>">
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"><rect width="100%" height="100%" fill="<?=random_gen_color()?>"></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark justify-content-between"><?=limit_string($list_post_one['title'],100)?> <em><?=$list_post_one['date_created']?></em></strong>
        <?=limit_string(BBCode_safe($list_post_one['description']),500)?>
        
      </p>
      
    </div></a>
    <?php }?>
</div>
<?php }?>
</div>


</div>

