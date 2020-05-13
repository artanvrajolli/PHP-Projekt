<?php
// ajax file 

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['dashboard']) && isset($_POST['page']) && is_numeric($_POST['page'])){

    $page = $_POST['page'];


$list_post_10 = $dbpdo->QueryFetchArrayAll("Select * From posts order by date_created DESC limit $page,10");

foreach($list_post_10 as $list_post){
    ?>

 <a style="text-decoration: none;" href="/dashboard/<?=$list_post['pid']?>">
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"><rect width="100%" height="100%" fill="<?=random_gen_color()?>"></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark justify-content-between"><?=limit_string($list_post['title'],100)?> <em><?=$list_post['date_created']?></em></strong>
        <?=limit_string(BBCode_safe($list_post['description']),500)?>
        
      </p>
      
    </div></a>


    <?php
}



}elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['pid'])){
    sleep(0.5); // anti spam like button
if(is_numeric($_POST['pid'])){

    $islikedfromuser = $dbpdo->getRows("SELECT * FROM `post_liked` where uid=".$_SESSION['id']." and pid=".$_POST['pid']);

    if($islikedfromuser == 0){
        $dbpdo->executeQuery("INSERT INTO post_liked (pid,uid) VALUES(:pid,:uid) ",[":pid"=>$_POST['pid'],":uid"=>$_SESSION['id']]);
    }else{
         $dbpdo->executeQuery("Delete from post_liked where pid =:pid and uid=:uid ",[":pid"=>$_POST['pid'],":uid"=>$_SESSION['id']]);
    }

}

}else{
    $dbpdo->executeQuery("UPDATE users set `last_online`=NOW() where id = :id ",[":id"=>$_SESSION['id']]);
}

?>