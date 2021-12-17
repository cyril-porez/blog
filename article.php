<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "blog");
    mysqli_set_charset($connex, 'utf8');  
    
    $user = $_SESSION['user'][0]['id'];
 
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id = '$user'");
    $infoUser = mysqli_fetch_all($requete);
    // intval permet de transformer la string comprise dans le tableau de l'index id en entier.
    $idUser = intval($infoUser[0][0], $base = 10);
   
    $recupArticle = $_GET['article'];
    
    $requete2 = mysqli_query($connex, "SELECT articles.id, article, nom, date, login  from articles inner join utilisateurs inner join categories on articles.id_utilisateur = utilisateurs.id and articles.id_categorie = categories.id where articles.id = '$recupArticle'");
    $articles = mysqli_fetch_all($requete2, MYSQLI_ASSOC);

    if (isset($_POST["message"])) {
        $msg = $_POST["message"];
        $requete = mysqli_query($connex, "INSERT into commentaires (commentaire, id_article, id_utilisateur) values ('$msg', '$recupArticle', '$idUser')");
    }

    if (isset($_POST["like"])) {
        $like = $_POST["like"];
        $requete_like = mysqli_query($connex, "INSERT into intermediaire_article_like (id_article, id_utilisateur, etat_like, dislike) values ('$recupArticle', '$user', '1', '0')");
        header("Refresh: 0");
        var_dump($requete_like);
    }
    else if (isset($_POST["dislike"])) {
        $dislike = $_POST["dislike"];
        $requete_dislike = mysqli_query($connex, "INSERT into intermediaire_article_like (id_article, id_utilisateur, etat_like, dislike) values ('$recupArticle', '$user', '0', '1')");
    }
?>

<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <?php
                echo $articles[0]['login'];
                echo $articles[0]['date'];
                echo $articles[0]['nom'];
                echo $articles[0]['article'];

                $requeteLike = mysqli_query($connex, "SELECT count(etat_like) as nbr_like from intermediaire_article_like where id_article = 14 and etat_like = 1;");
                $nbr_like = mysqli_fetch_all($requeteLike, MYSQLI_ASSOC);
                var_dump($nbr_like);
            ?>
            <p><?php echo $nbr_like[0]["nbr_like"] ?></p>
            <form action="" method="post">
                <button name="like"><img src="images/like.jpg" class="logo" alt="like"></button>
                <button name="dislike"><img src="images/deslike.png" class="logo" alt="dislike"></button>
            </form>
        </div>
        <div>
            <h1>Commentaire</h1>
            <h3>Donner votre avis</h3>
            <?php
                $requete3 = mysqli_query($connex, "SELECT commentaire, commentaires.date, login, articles.id from articles inner join commentaires on articles.id = commentaires.id_article  inner join utilisateurs on utilisateurs.id = commentaires.id_utilisateur where articles.id = '$recupArticle';");
                $comArticles = mysqli_fetch_all($requete3, MYSQLI_ASSOC);
            ?>
            <div>
                <?php
                    foreach ($comArticles as $comArticle) {?>    
                        <div id="container">
                            <div id="entête">
                                <fieldset id="bordure">
                                    <legend id="contour">
                                         <?php echo "Login:" . " " . $comArticle['login'] . " " . "Posté le :" . " " . $comArticle['date']; ?>
                                        
                                    </legend>
                                    <?php echo $comArticle['commentaire'] ?>
                                </fieldset>
                            </div>
                                                
                        </div><?php 
                    } 
                ?>      
            </div>
        </div>
        <div>
            <form action="" method='post'>
                <textarea name="message" id="msg" cols="30" rows="10"></textarea>
                <input type="submit" id="buton" value="envoyer">
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>