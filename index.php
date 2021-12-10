<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "blog");

    $requete = mysqli_query($connex, "SELECT articles.id, article, date, login, nom from articles inner join utilisateurs on id_utilisateur = utilisateurs.id inner join categories on id_categorie = categories.id  order by  articles.id desc limit 3");
    $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <header>
        <a href="deconnexion.php">Deco</a>
    </header>
    <main>
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
    </main>
    <footer>

    </footer>    
</body>
</html>