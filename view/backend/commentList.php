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

