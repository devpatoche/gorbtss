<?php 
session_start();

require('secure/critical/BDD.php');

if(isset($_POST['sub_register']))
{

  $prenom = htmlentities($_POST['prenom']);
  $nom = htmlentities($_POST['nom']);
  $classe = htmlentities($_POST['class']);

  if(!empty($prenom) AND !empty($nom) AND !empty($classe) AND !empty($_POST['contact']))
  {

    $insert_mbr = $k0f->prepare('INSERT INTO `reg_request`( `prenom`, `nom`, `classe`, `contact`) VALUES (?,?,?,?)');

    $insert_mbr->execute(array($prenom, $nom, $classe, $_POST['contact']));

    $success_active = true;
    $success = "Nous venons d'envoyer votre demande aux administrateur du site qui pourrons ou pas vous accepter sur le site, vous receverez un mail ou un appel pour vous dire que votre compte à été créer avec succès, le numéros qui vous appeleras est en masqué donc n'ayez pas peur la réponse se fait sous 48h. Merci de votre compréhension.";

  }
  else
  {

    $error_active = true;
    $error = "Vous n'avez pas fini de compléter le formulaire, veuillez le terminer avent de valider votre demande ...";

  }

}


?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Gorbtss">
    <link rel="icon" href="images/logo2.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/starter-template/">

    <title>Demande de compte - Gorbtss</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Gorbtss</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index">Acceuil</a></li>
            <li><a href="me-connecter">Connexion</a></li>
            <li class="active"><a href="m-inscrire">Demander à m'inscrire</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <br>
      <div class="jumbotron">

        <?php
        if(isset($error_active)) {
        ?>

        <font color="red"><?php echo $error; ?></font>

        <?php 

        }
        else if(isset($success_active))
        {
        ?>

        <font color="green">Bravo! <?php echo $success; ?></font>

        <?php 
        }
        ?>

        <h1><code>Demande de compte</code></h1><hr>
        <form method="post" action="" autocomplete="off">
          
          <div class="form-group">
            
            <label for="prenom">Nom d'utlisateur : </label>

            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Michel">
          </div>
          <div class="form-group">
            
            <label for="nom">Nom d'utlisateur : </label>

            <input type="text" name="nom" id="nom" class="form-control" placeholder="Jaillard">
          </div>
          <div class="form-group">
            
            <label for="class">Classe dans la quelle vous êtes:</label>
            <input type="text" name="class" id="class" placeholder="4A" class="form-control">
          </div>

          <div class="form-group">
            
            <label for="contact">Votre adresse mail ou numéro de téléphone</label>
            <input type="text" name="contact" id="contact" class="form-control">
            <p><font color="red">⚠ Si vous mettez votre numéro de téléphone vous serrez appeler mais aucune taxe ne seras ajouter</font></p>

          </div>
          <p><font color="red">⚠ Se réseaux social est réserver au collègiens à chaque fin d'année les 3ème sont supprimer de la base de donnée ⚠</font></p>
           <button type="submit" name="sub_register" class="btn btn-warning">Obtenir un compte</button>
        </form>
      </div>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
