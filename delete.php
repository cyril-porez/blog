<?php
    session_start();
    require ('bdd.php');
    
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

<body>
    <header>
        <?php
            require ('header.php');
        ?>
    </header>
    <main>
        <h1>Supprimer des utilisateurs</h1>

        <p>Voulez-vous supprimer l'utilisateur id = <?php echo $user[0]['id']; ?> et login = <?php echo $user[0]['login'] ?> ?</p>

        <form action="" method="post">
            <input type="submit" name="delete" id="oui" value="oui">
            <input type="submit" name="back" id="non" value="non">
        </form>
    </main>
    <footer>
        <?php
            require('footer.php');
        ?>
    </footer>
</body>
</html>