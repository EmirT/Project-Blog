<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= isset($title) ? $title : 'Jean Forteroche' ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/Web/3rdParty/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/Web/3rdParty/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/Web/css/clean-blog.min.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/">Jean Forteroche</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Accueil</a>
            </li>
            <?php if ($user->isAuthenticated()) { ?>
            <li class="nav-item">
              <a class="nav-link" href="/admin/">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/chapters-insert.html">Ajouter une chapters</a></li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/logOut.html">Déconnexion</a></li>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('Web/images/mountain.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Billet simple pour l'Alaska</h1>
              <span class="subheading">Jean Forteroche</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
              <h3 class="post-subtitle">
                <?= $content ?>
              </h3>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; ET</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/Web/3rdParty/jquery/jquery.min.js"></script>
    <script src="/Web/3rdParty/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>tinymce.init({selector: '#mytextarea',
                          language_url : '/Web/js/langs/fr_FR.js',
                          forced_root_block : '',
                          force_p_newline : false,
                          force_br_newline: true
                        });
    </script>
  </body>
</html>
