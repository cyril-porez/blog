<?php
    session_start();  
    require ('bdd.php');
    require ('header.php');
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

<body class="body_ca">
<?php require('navbar.php') ?>
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
    <?php require('footer.php') ?>
</body>
</html>