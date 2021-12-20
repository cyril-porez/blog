<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($connex, 'utf8');
    require ('header.php');
    $title = 'Admin Delete';

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
<main>
        <h1>Supprimer des utilisateurs</h1>

        <p>Voulez-vous supprimer l'utilisateur id = <?php echo $user[0]['id']; ?> et login = <?php echo $user[0]['login'] ?> ?</p>

        <form action="" method="post">
            <input type="submit" name="delete" value="Supprimer">
            <input type="submit" name="back" value="Retour">
        </form>

    </main>
</body>
</html>