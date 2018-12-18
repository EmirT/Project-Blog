<br>
<section>
    <div class="container index">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Commentaire</li>
            </ol>
        </nav>
      <div class="table-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Tous les commentaires postés</h3>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Chaptaire</th>    
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Date de création</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) { ?>
                    <tr>
                        <td><?php foreach ($listChapters as $chapters) {  if ($comment['chapters'] == $chapters['id']) { echo htmlspecialchars($chapters['title']); } ?> <?php } ?></td>
                        <td><strong><?= htmlspecialchars($comment['writer']) ?></strong></td>
                        <td><p><?= nl2br(htmlspecialchars($comment['content'])) ?></p></td>
                        <td><span class="text-muted"><?= $comment['creationDate']->format('d/m/Y à H\hi') ?></span></td>
                        <td>
                        <a href="comment-update-<?= $comment['id'] ?>.html" class="edit" title="Modifier" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="comment-delete-<?= $comment['id'] ?>.html" class="delete" title="Supprimer" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>  
      </div>  
</section>