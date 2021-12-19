<?php
    session_start();
    
  
    $bdd = mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($bdd, 'utf8');
    require ('header.php');
    $title = 'Créer article';
    
    $id_user = $_SESSION["user"][0]["id"];
    $request= mysqli_query($bdd, "SELECT * FROM categories");
    $fetch = mysqli_fetch_all($request, MYSQLI_ASSOC);
    if (isset($_POST["text_article"]) && isset($_POST["categorie"])) {
        $txt_article = $_POST["text_article"];        
        $id_cat= $_POST["categorie"];        
        $request2= mysqli_query($bdd, "INSERT INTO articles (article, id_utilisateur, id_categorie) VALUES ('$txt_article', '$id_user', '$id_cat')");   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="creer-article.css">
    <title>Creer Article</title>
</head>
<body class="body_ca">
    <header>

    </header>
    <main>
        <form class="form" action="creer-article.php" method="POST">
            <div class="webflow-style-input">
                <input type="text" name="text_article" placeholder="Créer un Article">
                <select name="categorie">
                    <option value="choose" name="choose">Choisir une catégorie d'article</option>
                    <?php
                        foreach($fetch as $value) {
                            echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                        }
                    ?>
                    <input class="input1" type="submit" name="envoyer" value="envoyer">
                </select>
            </div>
        </form>
        <footer>

        </footer>   
    </main>
</body>
</html>