<?php

if(isset($_POST['add_post'])){
    // pid	uid	title	description	post_tags	date_created
    $error = 0;
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
        $msg = '<div class="bar success"><i class="far fa-check-circle"></i> Your post has been added to the Dashboard</div>';
        $params = [
            ":uid"=>$_SESSION['id'],
            ":title"=>$title,
            ":description"=>$desc
            ];
       $dbpdo->executeQuery("INSERT INTO `posts` (`uid`, `title`,`description`) VALUES (:uid, :title, :description)",$params);
            
    }

}






?>