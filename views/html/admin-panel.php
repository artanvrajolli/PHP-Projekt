<?php
if($_SESSION['is_admin'] != 1){
 exit("You are not admin to see this part of the page!");
}

include_once('controllers/admin-panel.php');

if(isset($partpage[2]) && $partpage[2] == 'users' && isset($partpage[3]) && $partpage[3] == 'uid'){
  $takeinfo = $dbpdo->queryFetch("SELECT * from `users` WHERE id=:id limit 1",[":id"=>$partpage[4]]);
  if($takeinfo == false){
    header("location: /admin-panel/users");
    exit();
    
  }
  /*	
id
username
email
password
register_date
last_online
is_admin
*/
  ?>
<div class="row border shadow_b justify-content-center p-2">

<div class="col-md-8 order-md-1">
<div>
<?=$msg?>
</div>
      <h4 class="mb-3">Edit User Form</h4>
      <form method="post" class="needs-validation" novalidate="">
        <div class="row">
        <input type="text" class="form-control" name="tid"  style="display:none;" placeholder="Username" value="<?=$takeinfo['id']?>" required="">
          <div class="col-md-6 mb-3">
            <label for="lastName">Username</label>
            <input type="text" class="form-control" name="tusername"  placeholder="Username" value="<?=$takeinfo['username']?>" required="">
          </div>
        </div>
        <div class="mb-3">
          <label for="username">Email</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" name="temail" value="<?=$takeinfo['email']?>"placeholder="Email" required="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lastName">Password</label>
            <input type="text" class="form-control" name="tpassword"  placeholder="Leave blank to leave it unchanged!" value="" required="">
          </div>
        </div>

      
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" <?=($takeinfo['is_admin'] == 1 ? 'checked' : '' )?> name="tis_admin" id="save-info">
          <label class="custom-control-label"  for="save-info"> Admin</label>
        </div>
        <hr class="mb-4">

        <div class="row justify-content-between">
        <button class="btn btn-primary btn-lg " name="tsubmit" type="submit"> Edit this user</button>

        <button class="btn btn-danger btn-lg " name="tdelete" type="submit"> Delete this user</button>
        </div>
        <hr class="mb-4">
      </form>
    </div>

</div>



<?php }elseif(isset($partpage[2]) && $partpage[2] == 'users'){

?>


<div class="row justify-content-center col-md-12">
<div class="row col-md-12 justify-content-center btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-3" role="group" aria-label="First group">
<a href="/admin-panel/users/<?=(($thispage-1)*10)?>">
  <button class="btn btn-secondary py-0 px-1 mt-1 mb-1 mr-1" type="button"><i class="fas fa-arrow-left"></i></button>
</a>
    <?php
    for($i=($thispage-5 < 0 ? 0 : $thispage-5);$i<$Numpages && $i < $thispage+5 ;$i++){
        if($i != $thispage){
            $addcss = 'btn-secondary';
        }else{
            $addcss = 'btn-primary';
        }

    ?>
    <a href="/admin-panel/users/<?=$i*10?>"><button type="button" class="btn <?=$addcss?> py-0 px-1 mt-1 mb-1 mr-1"><?=$i+1?></button></a>
    <?php } ?>

    <a href="/admin-panel/users/<?=($thispage+1)*10?>"><button class="btn btn-secondary py-0 px-1 mt-1 mb-1 mr-1" type="button"><i class="fas fa-arrow-right"></i></button></a>
  </div>
</div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Signup date</th>
      <th scope="col">Last Online</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($ten_users as $one_user){
   
    ?>
    <tr>
      <th scope="row"><?=$one_user->getId()?></th>
      <td><a style="text-decoration:none;" href="/profile/<?=$one_user->getUsername()?>"><i class="fas fa-user-alt" aria-hidden="true"></i> <?=$one_user->getUsername()?></a></td>
      <td><?=$one_user->getEmail()?></td>
      <td><?=$one_user->getSignUpdate()?></td>
      <td><?=($one_user->getLast_Online() == '' || $one_user->getLast_Online() == '0000-00-00 00:00:00' ? 'Never' : $one_user->getLast_Online())?></td>
      <td><a style="text-decoration:none; " href="/admin-panel/users/uid/<?=$one_user->getId()?>"><i class="fas fa-user-edit"></i> Edit</a></td>
    </tr>
<?php }?>
  </tbody>
</table>
<div class="row col-md-12 justify-content-center btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-3" role="group" aria-label="First group">
<a href="/admin-panel/users/<?=(($thispage-1)*10)?>">
  <button class="btn btn-secondary py-0 px-1 mt-1 mb-1 mr-1" type="button"><i class="fas fa-arrow-left"></i></button>
</a>
    <?php
    for($i=($thispage-5 < 0 ? 0 : $thispage-5);$i<$Numpages && $i < $thispage+5 ;$i++){
        if($i != $thispage){
            $addcss = 'btn-secondary';
        }else{
            $addcss = 'btn-primary';
        }

    ?>
    <a href="/admin-panel/users/<?=$i*10?>"><button type="button" class="btn <?=$addcss?> py-0 px-1 mt-1 mb-1 mr-1"><?=$i+1?></button></a>
    <?php } ?>

    <a href="/admin-panel/users/<?=($thispage+1)*10?>"><button class="btn btn-secondary py-0 px-1 mt-1 mb-1 mr-1" type="button"><i class="fas fa-arrow-right"></i></button></a>
  </div>
</div>
</div>

<?php
}else if(isset($partpage[2]) && ($partpage[2] == 'text' || $partpage[2] == 'backup')){
  ?>
<div class="row border shadow_b p-5 justify-content-center col-md-12">
<form method="post">
<div class="row">
<?=$msg?>
</div>
<div class=" row ">
    <div class="px-1 py-1 mx-auto text-center">
      <h1 class="display-10">Save list of users in .txt</h1>
    </div>
  <div class="row mb-3 mx-auto ">
    <div class="input-group-text mx-2">
    <input name="txtid" type="checkbox" > <span class="ml-2"> Id</span>
    </div>
    <div class="input-group-text mx-2">
    <input name="txtusername" type="checkbox" > <span class="ml-2"> Username</span>
    </div>
    <div class="input-group-text mx-2">
    <input name="txtemail" type="checkbox" > <span class="ml-2"> Email</span>
    </div>
    <div class="input-group-text mx-2">
    <input name="txtpassword" type="checkbox" > <span class="ml-2"> Password</span>
    </div>
    <div class="input-group-text mx-2">
    <input name="txtregister" type="checkbox" > <span class="ml-2"> Signup Date</span>
    </div>
    <div class="input-group-text mx-2">
    <input name="txtlast_online" type="checkbox" > <span class="ml-2"> Last Online</span>
    </div>
  </div>
  <div class="form-group mx-auto justify-content-center col-md-5">
    <label for="exampleFormControlSelect1">Split with:</label>
    <select name="spliterwith" class="form-control" id="exampleFormControlSelect1">
      <option>|</option>
      <option>/</option>
      <option>$</option>
      <option>%</option>
      <option>!</option>
      <option>#</option>
    </select>
  </div>
</div>
<div class="row justify-content-center">
<button class="btn btn-outline-primary" name="savetotext">Save to .txt file</button>
</div>
</form>


</div>
<?php }?>

