<?php

$list_post_10 = $dbpdo->QueryFetchArrayAll("Select * From posts order by date_created DESC limit 10");
?>

<main role="main" class="container">
<?php
 if(isset($partpage[2]) && isset($partpage[3]) && $partpage[3] == 'edit' && is_numeric($partpage[2])){
  $pageid = $partpage[2];
  $userdata = $dbpdo->queryFetch("SELECT * from `posts` WHERE pid=:pid limit 1",[":pid"=>$pageid]);
  if($userdata['uid'] !== $_SESSION['id']){
    header("location: /dashboard/".$pageid);
    exit();
  }

  ?>
<div class="row justify-content-center">
        <div class="col-md-10 shadow_b m-2">
        <div class="mt-2">
        <?=$msg?>
        </div>
          <h4 class="mb-3">Edit post</h4>
          <form class="needs-validation" novalidate="" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Title</label>
     <input name="pid" type="text" style="display:none;" class="form-control" id="firstName" placeholder="" value="<?=$userdata['pid']?>" required="">
     <input name="title" type="text" class="form-control" id="firstName" placeholder="" value="<?=$userdata['title']?>" required="">
                <div class="invalid-feedback">
                  Valid Title is required.
                </div>
              </div>
            </div>
            <div class="form-group">
            <label>Description</label>
            <div class="row col-md-12 mb-2 ">
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
                <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="15"><?=$userdata['description']?></textarea>
            </div>
            <hr class="mb-4 ">
            <div class="row justify-content-between mx-2">
            <button class="btn btn-primary col-md-5 " name="edit_post" type="submit">Edit Post</button>
            <!-- return confirm('Are you sure you would like to delete your site?'); -->
            <button class="btn btn-danger col-md-5 " onclick="return confirm('Are you sure you want to delete this post?')" name="delet_post" type="submit">Delete Post</button>
            </div>
            <hr class="mb-4">
          </form>
        </div>
      </div>

<script>
function add_bbcode(tag){
		document.getElementById("exampleFormControlTextarea1").value = document.getElementById("exampleFormControlTextarea1").value + tag; 
    console.log("added:"+tag);
}
</script>
<?php
}else if(!isset($partpage[2])){ 
  
  ?>
  <div class="d-flex align-items-center p-3 my-3 text-black-25 rounded  justify-content-between">
    <h5 class="border-bottom border-gray pb-2 mb-0">Dashboard</h5>
    <a href="/add_post"><button type="button" class="btn btn-info">Add Post</button></a>
  </div>

  <div  class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
    <div id="loader_content_id">
    <?php
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
     <a onclick="load_content()">
<center >
<button  class="btn btn-primary mt-2" type="button" >
  Load More
</button>
</center>
</a>



      <script>
      
var counter = 10;
function load_content() {
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("loaded counter:"+counter);
      document.getElementById('loader_content_id').innerHTML += this.responseText;
      counter = counter + 10;
    }
  };
  xhttp.open("POST", "/update_user", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("dashboard&page="+counter);
}
      </script>




  </div>

    </div>
    <?php }else if (is_numeric($partpage[2])){
      $pageid = $partpage[2];
      $userdata = $dbpdo->queryFetch("SELECT * from `posts` WHERE pid=:pid limit 1",[":pid"=>$partpage[2]]);
     
      $user_post = $dbpdo->queryFetch("SELECT username from `users` WHERE id=:uid limit 1",[":uid"=>$userdata['uid']]);

      $description = $userdata['description'];

      if($description == ""){
        header("location: /dashboard");
        exit();
      }

      $total = $dbpdo->getRows("SELECT * FROM `post_liked` where pid=".$partpage[2]);

      $islikedfromuser = $dbpdo->getRows("SELECT * FROM `post_liked` where uid=".$_SESSION['id']." and pid=".$partpage[2]);
      if($islikedfromuser == 1){
        $colorarrow = 'color: #00b400;';
      }else{
        $colorarrow = 'color:gray';
      }
?>

<hr>
<div class="d-flex align-items-center mt-3 text-black-25 rounded  justify-content-between">
    <span><h5><?=$userdata['title']?> 
    <?php if($userdata['uid'] == $_SESSION['id']){ ?>
     <a class="btn btn-outline-warning px-3 py-0 mb-1" href="/dashboard/<?=$pageid?>/edit">Edit</a>
    <?php }?>
      </h5> <a style="text-decoration: none;" href="#" onclick="like_post()"><span id="total_likes"><?=$total?></span> <i id="uparrow" style="<?=$colorarrow?>" class="fas fa-arrow-up"></i><b id="info_like"></b></a></span><span> <h6><a style="text-decoration: none;" href="/profile/<?=$user_post['username']?>"><i class="fas fa-user-alt"></i> <?=$user_post['username']?></a></h6><em><?=$userdata['date_created']?></em></span>
  </div>
  <hr>
  <em  class="text-right">Share: 
  <a style="text-decoration: none;" href="javascript:void(0)" onclick="open_popup('https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost.com%2Fdashboard%2F<?=$pageid?>','Facebook Share',600,300); return false;"> <i class="fab fa-facebook-f"></i> Facebook</a> <a style="text-decoration: none;" href="javascript:void(0)" onclick="open_popup('http://twitter.com/intent/tweet?text=New+Post:+http://localhost/dashboard/<?=$pageid?>','Twitter Share',520,280); return false;"><i class="fab fa-twitter"></i> Twitter</a> </em>
<pre class="shadow_b p-3" id="prebbcode">
<?=BBCode($description)?>
</pre>
<hr>
<script>


var liked = <?=$islikedfromuser?>;
function like_post() {
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
      console.log(this.responseText);
      // style="color:gray"
      if(liked == 0){
      document.getElementById("uparrow").style = "color: #00b400;";
      document.getElementById("total_likes").innerHTML = parseInt(document.getElementById("total_likes").innerHTML)+1;
      effect_like("Liked");
       liked = 1;
      }else{
        document.getElementById("uparrow").style = "color:gray;";
      document.getElementById("total_likes").innerHTML = parseInt(document.getElementById("total_likes").innerHTML)-1;
      effect_like("Liked removed");
       liked = 0;
      }

     
    }
  };
  xhttp.open("POST", "/update_user", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("pid=<?=$pageid?>");

}


function effect_like(mystring){
  document.getElementById('info_like').innerHTML = " "+mystring;
  $("#info_like").show();
  setTimeout(function(){
    $("#info_like").hide();
  },1000);
}

function open_popup(a,b,c,d){var e=(screen.width-c)/2;var f=(screen.height-d)/2;var g='width='+c+', height='+d;g+=', top='+f+', left='+e;g+=', directories=no';g+=', location=no';g+=', menubar=no';g+=', resizable=no';g+=', scrollbars=no';g+=', status=no';g+=', toolbar=no';newwin=window.open(a,b,g);if(window.focus){newwin.focus()}return false} </script>



    <?php }else{ header("location: /404"); } ?>
</main>