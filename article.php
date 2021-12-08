<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "blog");
    mysqli_set_charset($connex, 'utf8');    
    $recupArticle = $_GET['article'];
    echo $recupArticle;
    $requete = mysqli_query($connex, "SELECT articles.id, article, nom, date, login  from articles inner join utilisateurs inner join categories on articles.id_utilisateur = utilisateurs.id and articles.id_categorie = categories.id where articles.id = '$recupArticle'");
    $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    var_dump($articles);

    if (isset($_POST["message"])) {
        $msg = $_POST["message"];
        $requete = mysqli_query($connex, "INSERT into commentaires (commentaire, id_article, id_utilisateur, date) VALUES ('$msg', '$recupArticle', ) ");
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
            ?>
        </div>
        <div>
            <form action="article.php" method='post'>
                <textarea name="message" id="msg" cols="30" rows="10"></textarea>
                <input type="submit" id="buton" value="envoyer">
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>