<?php
    $connex = mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($connex, 'utf8');
    require ('header.php');
    $title = 'Admin Update Categorie';

    $categorie = $_GET["update"];
    echo ($categorie);
    $requete = mysqli_query($connex, "SELECT nom FROM categories WHERE id = '$categorie'");
    $categories = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    if (isset($_POST["back"])) {
        header("Location: categorie.php");
    }
    else if (isset($_POST["categorie"])) {
        $nom = $_POST["categorie"];
        $update = mysqli_query($connex, "UPDATE categories SET nom = '$nom' WHERE id = '$categorie'");
        header("Refresh:0");
        var_dump($update); 
    }
    
?>
     <main>
        <form action="" method="post">
            <input type="text" name="categorie"  value=<?php echo $categories[0]['nom']; ?>>
            <input type="submit" name="update" value="modifier">
            <input type="submit" name="back" value="retour">
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>