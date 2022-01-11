<?php
    session_start();
    require ('bdd.php');
    require ('header.php');
    $title = 'Accueil';

    $requete = mysqli_query($connex, "SELECT articles.id, article, date, login, nom from articles inner join utilisateurs on id_utilisateur = utilisateurs.id inner join categories on id_categorie = categories.id  order by  articles.id desc limit 3");
    $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <main>
        <!-- <a href ="deconnexion.php">DECO</a> -->
        <?php //header('location: connexion.php')?>
        <?php
            foreach ($articles as $article) { ?>
                <form action="article.php" method="get">
                    <div id="container">
                        <div id="container2">
                            <div>
                                <p>Posté par:
                                <?php echo $article['login']; ?></p>
                            </div>
                            <div>
                                <p>Posté le :
                                <?php echo $article['date']; ?></p>
                            </div>
                        </div>
                        <div>
                            <p>Catégorie : <?php echo $article['nom']; ?></p>
                        </div>
                        <div>
                            <?php echo $article['article']; ?></p>
                        </div>
                        <button name="article" value=<?php echo $article['id']; ?>>Article</button>
                    </div>
                </form><?php
            }
        ?>

        <div class="presentation">
           <div>
               <p>
                Bienvenue sur SPACENET ! Le blog qui parle d'aerospatiale, d'aeronautique et d'astronomie.
                Ici vous pourrez crée de nouveaux articles ou aussi bien commenter les articles qui sont
                déja présent mais attention il doivent tous concerner les mot de notre slogan "Aerospatiale",
                "Aeronautique" et "Astronomie".
                </p>
            </div>
        </div>
    </main>
        <?php require('footer.php') ?>
</body>
</html>