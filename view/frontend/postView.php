<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p><a href="index.php"  class="btn btn-outline-info ml-3">Retour à la page d'accueil</a></p>


<form  class="float-left ml-3" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" class="form-control" />
    </div>
    <div  class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control"  id="comment exampleFormControlTextarea1" name="comment" rows="3"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-outline-secondary" value="Ajouter un commentaire"/>
    </div>
</form>

 
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">
                <?= htmlspecialchars($post['title']) ?>
                </h2>
            </a>
            <p class="post-meta">
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            <br />
            <em>le <?= $post['creation_date_fr'] ?></em></p>
        </div>
            <hr>
            <hr>
           

<h2 class="col-lg-8 col-md-10 mx-auto">Commentaires</h2>


<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
                while ($comment = $comments->fetch())
                {
            ?>
         
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">
                <?= htmlspecialchars($comment['author']) ?>
                </h2>
            </a>
            <p class="post-meta">
                <?= nl2br(htmlspecialchars($comment['comment'])) ?>
            <br />
            <em>le <?= $comment['comment_date_fr'] ?></em></p>
        </div>
            <hr>
            <?php
                }




?>








<?php $content = ob_get_clean(); ?>




<?php require('template.php'); ?>
