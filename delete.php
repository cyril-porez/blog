<?php
    $connex = mysqli_connect("localhost", "root", "root", "blog");
    $idUser= $_GET["delete"];
    $requete = mysqli_query($connex, "SELECT id, login FROM utilisateurs WHERE id = '$idUser'");
    $user = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    
    if (isset($_POST["delete"])) {
        $delete = mysqli_query($connex, "DELETE FROM utilisateurs WHERE id = '$idUser'");
        header("Location: admin.php");
    }
    else if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h1>Supprimer des utilisateurs</h1>

        <p>Voulez-vous supprimer l'utilisateur id = <?php echo $user[0]['id']; ?> et login = <?php echo $user[0]['login'] ?> ?</p>

        <form action="" method="post">
            <input type="submit" name="delete" value="Supprimer">
            <input type="submit" name="back" value="Retour">
        </form>

    </main>
    <footer>

    </footer>
</body>
</html>