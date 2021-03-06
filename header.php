<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/connexion.css">
  <link rel="stylesheet" href="css/inscription.css">
  <link rel="stylesheet" href="css/profil.css">
  <link rel="stylesheet" href="css/categorie.css">
  <link rel="stylesheet" href="css/article.css">
  <link rel="stylesheet" href="css/articles.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/delete.css">

  <title>SPACENET</title>
</head>
<html>
  <header>
    <div id="header">
        <div>
          <h1 id="spacenet">SPACENET</h1>
        </div>
        <div id="h3">
            <p>Blog d'aerospatiale, d'aeronautique et d'astronomie</p>
        </div>
    </div>
    <?php
      if (!empty($_SESSION)) {
        echo "<p id='bonjour_user'>Bonjour " .$_SESSION['user'][0]['login']." !</p>";
      }
    ?>
  </header>
  <?php
      require_once('navbar.php');
  ?>
