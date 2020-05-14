<?php

if(isset($_POST['edit_post'])){

    $error = 0;

    $pid = htmlentities($_POST['pid']);
    $title = htmlentities($_POST['title']);
    $desc = htmlentities($_POST['desc']);

    if($title == ''){
        $msg = '<div class="error">Empty Title is not allowed!</div>';
        $error = 1;
    }else if($desc == ''){
        $msg = '<div class="error">Empty Description is not allowed!</div>';
        $error = 1;
    }



    if($error == 0){
        $msg = '<div class="bar success"><i class="far fa-check-circle"></i> Your post has been updated to the Dashboard</div>';
        $params = [
            ":pid"=>$pid,
            ":uid"=>$_SESSION['id'],
            ":title"=>$title,
            ":description"=>$desc
            ];
            // INSERT INTO `posts` (`uid`, `title`,`description`) VALUES (:uid, :title, :description)
       $dbpdo->executeQuery("UPDATE posts set title = :title , description = :description WHERE pid = :pid and uid = :uid ",$params);
            
    }

    header("location: /dashboard/".$pid);
    exit();



}


if(isset($_POST['delet_post'])){
    $error = 0;

    $pid = htmlentities($_POST['pid']);
    $title = htmlentities($_POST['title']);
    $desc = htmlentities($_POST['desc']);


    if($error == 0){
        $params = [
            ":pid"=>$pid,
            ":uid"=>$_SESSION['id']
            ];
    $dbpdo->executeQuery("DELETE FROM posts WHERE pid=:pid and uid=:uid limit 1",$params);
    }

    header('location: /dashboard');
}










?>