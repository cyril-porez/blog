<?php
    session_start();  
    require ('bdd.php');
    
    $title = 'Créer article';
    
    $id_user = $_SESSION["user"][0]["id"];
    $request= mysqli_query($connex, "SELECT * FROM categories");
    $fetch = mysqli_fetch_all($request, MYSQLI_ASSOC);
    if (isset($_POST["text_article"]) && isset($_POST["categorie"])) {
        $txt_article = $_POST["text_article"];        
        $id_cat= $_POST["categorie"];        
        $request2= mysqli_query($bdd, "INSERT INTO articles (article, id_utilisateur, id_categorie) VALUES ('$txt_article', '$id_user', '$id_cat')");   
    }
?>

<html>
<body class="body_ca">
    <header>
        <?php
            require ('header.php');            
        ?>
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
    </main>
    <footer>
        <?php
            require('footer.php');
        ?>
    </footer>
</body>
</html>