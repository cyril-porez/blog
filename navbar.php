<?php
require('bdd.php');
$requeteCategorie = mysqli_query($connex, "SELECT * FROM categories");
$navbarCategories = mysqli_fetch_all($requeteCategorie, MYSQLI_ASSOC);
// var_dump($navbarCategories);



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
            <?php
                if(empty($_SESSION)){
                    echo '<li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>';}
            ?>
            <?php
                if(!empty($_SESSION)){
                    echo '<li><a href="profil.php">Modifier mon Profil</a></li>';
                }
            ?>
            <div class="dropdown">
                <li><a href="categorie.php">Categorie</a></li>
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