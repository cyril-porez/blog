<?php 
    session_start();
    require ('bdd.php');
    require ('header.php');

   
    $requete_favoris = mysqli_query($connex, "SELECT articles.id, article, login, nom, date from articles inner join utilisateurs on articles.id_utilisateur = utilisateurs.id inner join categories on articles.id_categorie = categories.id inner join favoris on favoris.id_article = articles.id where favoris.id_utilisateur = 14 ");
    $favoris = mysqli_fetch_all($requete_favoris);
    var_dump($favoris);
?>