<br>
<section>
    <div class="container index">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                     <p>Il y a actuellement <strong><?= $numberChapters ?></strong> chapitres.</p>
                    </div>   
                </div>
                    <div class="btn-toolbar float-sm-right">
                        <p><a href="signal.html" type="button" class="btn btn-outline-danger mr-3">Voir les signal commentaires</a></p>
                        <p><a href="comments.html" type="button" class="btn btn-outline-primary">Voir les commentaires</a></p>
                    </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Modification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                      foreach ($listeChapters as $chapters)
                      {
                        echo '<tr>
                                  <td>', $chapters['writer'], '</td><td>', $chapters['title'], '</td>
                                  <td> ', $chapters['dateAd']->format('d/m/Y à H\hi'), '</td>
                                  <td>', ($chapters['dateAd'] == $chapters['dateModif'] ? '-' : 'le '.$chapters['dateModif']->format('d/m/Y à H\hi')), '</td>
                                  <td><a href="/chapters-'.$chapters['id'].'.html" class="view" title="vue" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> 
                                      <a href="chapters-update-', $chapters['id'], '.html" class="edit" title="Modifier" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> 
                                      <a href="chapters-delete-', $chapters['id'], '.html" class="delete" title="Supprimer" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                  </td>
                              </tr>', "\n";
                      }     
                      ?>            
                </tbody>
            </table>
        </div>
    </div>   
</section>            