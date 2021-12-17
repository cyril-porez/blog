<?php
    $connex = mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($connex, 'utf8');
    $requeteCategorie = mysqli_query($connex, "SELECT * FROM categories");
    $dataCategories = mysqli_fetch_all($requeteCategorie, MYSQLI_ASSOC);
   
    if(isset($_POST["categorie"])) {
        $categorie = $_POST["categorie"];

        $requete = mysqli_query($connex, "INSERT into categories (nom) VALUES ('$categorie')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="categorie.php" method="post">
            <input type="submit" name="affichCategorie" value="afficher les catégories">
            <input type="submit" name="creatCategorie" value="Créer une categorie">
            <input type="submit" name="X" value="X">
            <input type="submit" name="back" value="Retour">
        </form>
        <?php
            if (isset($_POST["creatCategorie"])) {?>
                        <form action="categorie.php" method="post">
                            <input type="text" name="categorie" placeholder="categorie">
                            <input type="submit" name="creerCategorie" value="creer">
                        </form> <?php
            }
            else if (isset($_POST["back"])) {
                header("Location: admin.php");
            }
            else if (isset($_POST["affichCategorie"])) {?>
                <table>
                    <thead>
                        <th>id</th>
                        <th>nom</th>
                    </thead>
                    <tbody>
                    <?php                    
                        foreach($dataCategories as $dataCategorie) {
                            echo "<tr><td>" . $dataCategorie['id'] . "</td>";
                            echo "<td>" . $dataCategorie['nom'] . "</td>";?>
                            <form action="updateCategorie.php" method="get">
                                    <td><button name='update'  value=<?php echo $dataCategorie["id"]; ?>>Modifier</button></td>
                            </form>
                            <form action="deleteCategorie.php" method="get">
                                    <td><button name="delete" value=<?php echo $dataCategorie["id"]; ?> >supprimer</button></td></tr>
                            </form><?php
                        }                        
            }        
                ?>
            </tbody>
        </table>
    </main>
    <footer>

    </footer>
</body>
</html>