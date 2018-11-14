<?php

// Chargement des classes
require('C:/wamp64/www/tests/model/PostManager.php');
require('C:/wamp64/www/tests/model/CommentManager.php');


function addComment($postId, $author, $comment)
{
    $commentManager = new \wwww\tests\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: backend/index.php?action=post&id=' . $postId);
    }
}


