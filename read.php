<<<<<<< HEAD
<?php
    session_start();
    require ('bdd.php');
    require ('header.php');
    $title = 'Admin Read';

    $user = $_GET["read"];
    $data = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id='$user'");
    $info = mysqli_fetch_all($data, MYSQLI_ASSOC);

    if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>
<body>
<?php require('navbar.php') ?>
    <main>
    <div id='centre_admin'>
        <div id='form_admin'>
            <form action="" method="post">
                <input class="connect" type="text" name="id" placeholder="id" value=<?php echo $info[0]['id']; ?>>
                <input class="connect" type="text" name="login" placeholder="login" value=<?php echo $info[0]['login']; ?>>
                <input class="connect" type="text" name="email" placeholder="email" value=<?php echo $info[0]['email']; ?>>
                <input class="connect" type="text" name="id_droits" placeholder="id_droits" value=<?php echo $info[0]['id_droits']; ?>>
                <input class="connect" type="text" name="password" placeholder="password" value=<?php echo $info[0]['password']; ?>>
                <input class="connect" type="submit" name="back" value="retour">
            </form>
        </div>
    </div>
    </main>
    <?php require('footer.php') ?>
</body>
=======
<?php
    session_start();
    require ('bdd.php');
   
    $title = 'Admin Read';

    $user = $_GET["read"];
    $data = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id='$user'");
    $info = mysqli_fetch_all($data, MYSQLI_ASSOC);

    if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>

<html>
<body>
    <header>
        <?php
            require ('header.php');
        ?>
    </header>
    <main>
    <div id='centre_admin'>
        <div id='form_admin'>
            <form action="" method="post">
                <input class="connect" type="text" name="id" placeholder="id" value=<?php echo $info[0]['id']; ?>>
                <input class="connect" type="text" name="login" placeholder="login" value=<?php echo $info[0]['login']; ?>>
                <input class="connect" type="text" name="email" placeholder="email" value=<?php echo $info[0]['email']; ?>>
                <input class="connect" type="text" name="id_droits" placeholder="id_droits" value=<?php echo $info[0]['id_droits']; ?>>
                <input class="connect" type="text" name="password" placeholder="**********">
                <input class="connect" type="submit" name="back" value="retour">
            </form>
        </div>
    </div>
    </main>
    <footer>
        <?php
            require ('footer.php');
        ?>
    </footer>
</body>
>>>>>>> b4b767941aca503d345f04bd580d9881ae74eb0a
</html>