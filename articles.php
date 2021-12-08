<?php
    $connex = mysqli_connect("localhost", "root","", "blog");
    $requete = mysqli_query($connex, "SELECT articles.id, article, nom, date, login  from articles inner join utilisateurs inner join categories where articles.id_utilisateur = utilisateurs.id and articles.id_categorie = categories.id ORDER BY date DESC");
    $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="articles.css">
    <title>ARTICLES</title>
</head>
<body>
    <header>

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
                    <button >Article</button>
                </div>
                
            </form><?php
        }
    ?>     
    </main>
    <footer>

    </footer>
</body>
</html>