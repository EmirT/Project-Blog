
<?php ob_start(); ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): $message = '';?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form action="index.php" method="post">
        <div class="form-group">
          <label for="author">Auteur</label>
          <input type="text" name="author" id="author" class="form-control">
        </div>
        <div class="form-group">
          <label for="comment">Commentaire</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a Commentaire</button>
        </div>
      </form>
    </div>
  </div>
</div>




<?php $backendContent = ob_get_clean(); ?>
<?php require('template.php'); ?>