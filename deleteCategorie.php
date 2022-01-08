<?php
    session_start();
    require ('bdd.php');
    require('header.php');
    $title = 'deleteCategorie.php';

    $categorie = $_GET["delete"];
    echo $categorie;
    $requete = mysqli_query($connex, "SELECT * FROM categories where id = '$categorie'");
    $categories = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    var_dump($categories);
    if (isset($_POST["back"])) {
        header("Location: categorie.php");
    }
    else if (isset($_POST["delete"])) {
        $delete = mysqli_query($connex, "DELETE FROM categories WHERE id = '$categorie'");
        header("Location: categorie.php");
    }
?>
<main>
        <h1>Supprimer une categorie</h1>
        
            <p>Voulez vous supprimer la catégorie <?php echo $categories[0]['nom']; ?> ?</p>       
           
      
        <form action="" method="post">
            <input type="submit" name="delete" value="supprimer">
            <input type="submit"  name="back" value="retour">
        </form>
    </main>
</body>
</html>