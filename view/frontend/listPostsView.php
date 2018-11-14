<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>This is My episodes</h1>
<p>Derniers billets du blog :</p>

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
                while ($data = $posts->fetch())
                {
            ?>
         
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">
                <?= htmlspecialchars($data['title']) ?>
                </h2>
            </a>
            <p class="post-meta">
                <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            <em>le <?= $data['creation_date_fr'] ?></em></p>
        </div>
            <hr>
            <?php
                }
            $posts->closeCursor();
            ?>
            <?php $content = ob_get_clean(); ?>

            <?php require('template.php'); ?>