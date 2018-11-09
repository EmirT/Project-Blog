<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog pour Jean Forteroche">
    <meta name="author" content="">

    <title> Jean Forteroche </title>

    <!-- Bootstrap core CSS -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/styleBlog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- How to make Navigation in Bootstrap  -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php"> Jean Forteroche </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Qui est Jean Forteroche?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.html">I will put something here</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/sun2.JPG')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>La vie avec des livres</h1>
            </div>
          </div>
        </div>
      </div>
    </header>




    <!-- Main Content -->
    <div class="container">
   
<?php
        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=project-blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // On récupère les 5 derniers billets
        $req = $bdd->query('SELECT id, titre, contenu, images, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM livres ORDER BY date_creation DESC LIMIT 0, 5');

        while ($donnees = $req->fetch())
        {
    ?>
    

      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
               
                <a href="post.html">
                <img src="<?php echo ($donnees['images']); ?>" class="col-sm-5 float-left" alt="">
                    <h2 class="post-title">
                    <?php echo htmlspecialchars($donnees['titre']); ?>
                    
                    </h2>
                    <h3 class="post-subtitle">
                    <blockquote class="blockquote"> <?php
                        // On affiche le contenu du billet
                        echo nl2br(htmlspecialchars($donnees['contenu']));
                        ?></blockquote>
                    </h3>
                    </a>
                    <p class="post-meta">Créé par
                    <a href="#">Jean Forteroche</a>
                    <em>le <?php echo $donnees['date_creation_fr']; ?></em></p>
                </div>
                <em><a href="alaska_chapitre1.php">Chapitres 1: Je dans le primitif...</a></em> <br />
                <em><a href="alaska_chapitre2.php">Chapitres 2: La loi de la sauvage...</a></em>

                <hr>
            </div>
      </div>
    </div>

    <hr>
            <?php
        } // Fin de la boucle des billets
        $req->closeCursor();
        ?>
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
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendors/jquery/jquery.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
