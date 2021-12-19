<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($connex, 'utf8');  
    require ('header.php');
    $title = 'Article';

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
?>
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
</body>
</html>