<?php
    $connex = mysqli_connect("localhost", "root", "root", "blog");   
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supression Catégorie</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h1>Supprimer une categorie</h1>
        
            <p>Voulez vous supprimer la catégorie <?php echo $categories[0]['nom']; ?> ?</p>       
           
      
        <form action="" method="post">
            <input type="submit" name="delete" value="supprimer">
            <input type="submit"  name="back" value="retour">
        </form>
    </main>
    <footer>

    </footer>    
</body>
</html>