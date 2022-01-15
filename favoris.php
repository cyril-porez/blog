<?php 
    session_start();
    require ('bdd.php');
    require ('header.php');

    $requete = mysqli_query($connex, "SELECT id_utilisateur, id_categorie, date, article, categorie FROM article INNER JOIN favoris ON favoris" );
    $infofavoris = mysqli_fetch_all($requete);
    $requete_favoris = mysqli_query($connex, "SELECT article, date, login, nom FROM `articles` INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id INNER JOIN categories ON articles.id_categorie = categories.id INNER JOIN favoris ON articles.id_categorie = favoris.id");
    echo $requete_favoris

?>