    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><p>Il y a actuellement <?= $numberChapters ?> chapitres. En voici la liste :</p></div>
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
                                  <td>', $chapters['auteur'], '</td><td>', $chapters['titre'], '</td>
                                  <td> ', $chapters['dateAjout']->format('d/m/Y à H\hi'), '</td>
                                  <td>', ($chapters['dateAjout'] == $chapters['dateModif'] ? '-' : 'le '.$chapters['dateModif']->format('d/m/Y à H\hi')), '</td>
                                  <td><a href="#" class="view" title="Vue" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> <a href="chapters-update-', $chapters['id'], '.html" class="edit" title="Modifier" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> <a href="chapters-delete-', $chapters['id'], '.html" class="delete" title="Supprimer" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
                              </tr>', "\n";
                      }
                      ?>
                </tbody>
            </table>
        </div>
    </div>     
                               		                            
