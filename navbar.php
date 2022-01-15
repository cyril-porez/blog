<?php

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
            <li><a href="inscription.php">Inscription</a></li>';}?>
            <?php if(!empty($_SESSION)){
            echo '<li><a href="profil.php">Modifier mon Profil</a></li>';}?>
            <li><a href="">home</a></li>
            <li><a href="">home</a></li>
           <?php
            if(!empty($_SESSION)){
                    echo '<li><a href="deconnexion.php">deconnexion</a></li>';

            } ?>
        </ul>
    </div>
</div>