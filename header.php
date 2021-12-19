<?php
  var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class='body_header'>
  <main>
    <div class="wrap">
      <span class="decor"></span>
        <nav>
          <ul class="primary">
            <li>
              <a href="index.php">ASTROBLOG</a>
            </li>
            <li>
              <a href="articles.php">articles</a>
              <ul class="sub">
                <li><a href="">les fusées</a></li>
                <li><a href="">la galaxie</a></li>
                <li><a href="">la nasa</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                  <!-- <div class='icon'> -->
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
              </a>    
                <!-- </div> -->
              <ul class="sub">
                <li>
                  <?php  
                    if(isset($_SESSION['user']))
                    {
                      echo '<a href ="deconnexion.php">Deconnexion</a>';
                    }
                  ?>
                </li> 
                <li>
                  <?php  
                    if(isset($_SESSION['user']))
                    {
                      echo '<a href ="creer-article.php">Créer un Article</a>';
                    }
                  ?>
                </li>
                <li>
                  <?php  
                    if(isset($_SESSION['user']))
                    {
                      echo '<a href ="profil.php">Votre Profil</a>';
                    }
                  ?>

                </li>    
                <li>
                  <?php
                    if(!isset($_SESSION['user']))
                    {
                      echo '<a href="connexion.php">Connexion</a>';
                    
                    }
                  ?>
                </li>
                <li>
                  <?php
                    if(!isset($_SESSION['user']))
                      {
                        echo '<a href="inscription.php">Inscription</a>';
                      }
                  ?>
                  
                </li>
              </ul>  
            </li>    
          </ul>
      </nav>
    </div>
  </main>
</body>
</html>
