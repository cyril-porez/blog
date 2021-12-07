<?php
    $connex = mysqli_connect("localhost", "root", "", "blog");
    mysqli_set_charset($connex, 'utf8');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Catégorie</title>
</head>
<body>
    <header>

    </header>
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