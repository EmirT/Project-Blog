<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');



function comment(){
{
    $commentManager = new CommentManager();

    $comments = $commentManager->getComment($_GET[]);
    $comment = $comments->fetch();

    require('view/backend/commentList.php');
}


}