<p>Par <em><?= $chapters['auteur'] ?></em>, le <?= $chapters['dateAjout']->format('d/m/Y à H\hi') ?></p>
<h2><?= $chapters['titre'] ?></h2>
<p><?= nl2br($chapters['contenu']) ?></p>

<?php if ($chapters['dateAjout'] != $chapters['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $chapters['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
  <hr>
<hr>
<?php } ?>
 
<p class="commentLink"><a href="commenter-<?= $chapters['id'] ?>.html"><strong>Ajouter un commentaire</strong></a></p>
 
<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
 
?>
 
  
  <h5 class="post-subtitle"><p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p></h5>

    <p class="post-meta">Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?></p>
    
    <?php if ($user->isAuthenticated()) { ?>
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
    <hr>
 

<?php
}
?>
 
