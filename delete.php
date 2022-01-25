<<<<<<< HEAD
<?php
    session_start();
    require ('bdd.php');
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
<body>
<?php require('navbar.php') ?>
<main>
        <h1>Supprimer des utilisateurs</h1>

        <p>Voulez-vous supprimer l'utilisateur id = <?php echo $user[0]['id']; ?> et login = <?php echo $user[0]['login'] ?> ?</p>

        <form action="" method="post">
            <input type="submit" name="delete" value="Supprimer">
            <input type="submit" name="back" value="Retour">
        </form>

    </main>
    <?php require('footer.php') ?>
</body>
=======
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
        <h1 id="supp">Supprimer des utilisateurs</h1>

        <p id="voulez-vous">Voulez-vous supprimer l'utilisateur dont l'id est <?php echo $user[0]['id']; ?> et le login est <?php echo $user[0]['login'] ?> ?</p>
        <div class="centre_bouton">
            <form action="" method="post">
                <div>
                    <input type="submit" name="delete" id="oui" value="oui">
                    <input type="submit" name="back" id="non" value="non">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php
            require('footer.php');
        ?>
    </footer>
</body>
>>>>>>> b4b767941aca503d345f04bd580d9881ae74eb0a
</html>