<?php
// session_start();
require('bdd.php');
$requeteCategorie = mysqli_query($connex, "SELECT * FROM categories");
$requete_admin = mysqli_query($connex, "SELECT * FROM droits INNER JOIN utilisateurs WHERE droits.id = utilisateurs.id_droits");


$navbarCategories = mysqli_fetch_all($requeteCategorie, MYSQLI_ASSOC);
$navbaradmin = mysqli_fetch_all($requete_admin, MYSQLI_ASSOC);
// var_dump($navbaradmin);
?>
<link rel="stylesheet" href="css/navbar.css">
<div class="slidecontainer">
        <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <img id="cancel" src="https://cdn-icons-png.flaticon.com/128/271/271218.png" alt="">
    </label>
    <div class="sidebar">
        <ul>
            <li><a href="index.php">Accueil</a></li>
             <!-- if ($_SESSION['user'][0] == 'administrateur'){ -->
                <li><a href="admin.php">Admin</a></li>

            <li><a href="creer-article.php">Creer un article</a></li>
            <?php
                if(empty($_SESSION)){
                    echo '<li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>';}
            ?>
            <?php
                if(!empty($_SESSION)){
                    echo '<li><a href="favoris.php">Mes articles Favoris</a></li>
                   <li><a href="profil.php">Modifier mon Profil</a></li>';
                }
            ?>
            <div class="dropdown">
                <li><a href="">Categorie</a></li>
                <div class="dropdown-content">
                <?php
                    foreach($navbarCategories as $navbarCategorie => $value){?>
                        <a href="#"><p><?= $value['nom']; ?></p></a>
                    <?php
                    }
                ?>
                </div>
            </div>
            <li><a href="articles.php">Articles</a></li>
           <?php
            if(!empty($_SESSION)){
                    echo '<li><a href="deconnexion.php">deconnexion</a></li>';
            } ?>
        </ul>
    </div>
</div>