<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= isset($title) ? $title : 'Jean Forteroche' ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/3rdParty/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/3rdParty/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" >
    <!-- Custom styles for this template -->
    <link href="/css/admin.css" rel="stylesheet">

  </head>

  <body>



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Voir le blog</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="/admin/">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/chapters-insert.html">Ajouter un chapitre</a></li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/logOut.html">Déconnexion</a></li>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
    <?= $content ?>
    </div>       
     <hr>
     <hr>


    <!-- Bootstrap core JavaScript -->
    <script src="/3rdParty/jquery/jquery.min.js"></script>
    <script src="/3rdParty/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/Web/js/clean-blog.min.js"></script>

    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>tinymce.init({selector: '#mytextarea',
                          language_url : '/js/langs/fr_FR.js',
                          forced_root_block : '',
                          force_p_newline : false,
                          force_br_newline: true
                        });
    </script>

  </body>

</html>