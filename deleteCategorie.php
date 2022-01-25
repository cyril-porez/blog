<<<<<<< HEAD
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
<body>
<?php require('navbar.php') ?>
<main>
        <h1>Supprimer une categorie</h1>

            <p>Voulez vous supprimer la catégorie <?php echo $categories[0]['nom']; ?> ?</p>

        <form action="" method="post">
            <input type="submit" name="delete" value="supprimer">
            <input type="submit"  name="back" value="retour">
        </form>
    </main>
</body>
    <?php require('footer.php') ?>
=======
<?php
    session_start();
    require ('bdd.php');

    $title = 'deleteCategorie.php';

    $categorie = $_GET["delete"];

    $requete = mysqli_query($connex, "SELECT * FROM categories where id = '$categorie'");
    $categories = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    if (isset($_POST["back"])) {
        header("Location: categorie.php");
    }
    else if (isset($_POST["delete"])) {
        $delete = mysqli_query($connex, "DELETE FROM categories WHERE id = '$categorie'");
        header("Location: categorie.php");
    }
?>

<html>
<body>
    <header>
        <?php
            require('header.php');
        ?>
    </header>
    <main>
        <?php
            require('navbar.php');
        ?>
        <h1 id="supp">Supprimer une categorie</h1>

        <p id="voulez-vous">Voulez vous supprimer la catégorie <?php echo $categories[0]['nom']; ?> ?</p>

        <form action="" method="post">
            <input id="oui" type="submit" name="delete" value="oui">
            <input id="non" type="submit"  name="back" value="retour">
        </form>
    </main>
    <footer>
        <?php
            require('footer.php');
        ?>
    </footer>
</body>
>>>>>>> b4b767941aca503d345f04bd580d9881ae74eb0a
</html>