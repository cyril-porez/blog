<?php
    session_start();
    require ('bdd.php');
    require ('header.php');
    $title = 'Profil';
    // var_dump($_SESSION["user"]);
// if (isset($_POST['logout']))
// {
//     session_destroy();
//     header('location:connexion.php');
// }


// echo ('<pre>');
// var_dump($_SESSION);
// echo ('</pre>');


    $userConnect = $_SESSION["user"][0]["login"];
    //echo $userConnect;
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$userConnect'");
    $infoUser = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    $error_log = "";
    $error = "";

    if (!empty($_POST["login"])) {
        $login = $_POST["login"];
        $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$login'");
        $verifLogin = mysqli_fetch_all($requete);
        if (count($verifLogin) == 0) {
                $update = mysqli_query($connex, "UPDATE utilisateurs SET login = '$login' WHERE login ='$userConnect'");
                $_SESSION["user"] = $infoUser;
                header("refresh: 0");
        }
        else {
            $error_log = "* Ce login existe déjà";
        }
    }
    else if (!empty($_POST["password"])) {
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        if ($password == $confirmPassword) {
            $passHash = password_hash($password, PASSWORD_ARGON2ID);
            $update = mysqli_query($connex, "UPDATE utilisateurs SET password = '$passHash' WHERE login ='$userConnect'");
            header("refresh: 0");
        }

    }
    else if (isset($_POST["login"])) {
        $error_log = "* oublis dans les champs";
    }
    else if (isset($_POST["password"])) {
        $error = "* oublis dans les champs";
    }
?>
<body>
<main id="main3">
<?php require ('navbar.php');?>
    <div class="page-profil">
        <div class="conteneur1">
            <!-- <div class="titre-profil">
                <h1> MON PROFIL</h1>
            </div> -->
        <div class="info-profil">
            <?php
                if(isset($_SESSION['user']))
            {
                echo '<div class="info-user">'. $_SESSION ['user'][0]['login'] . ',</br> bienvenue dans votre espace personnel.'. '</br></div>';
                // echo '<div class="info-user">'.'votre login actuel est: ' . $_SESSION['user'][0]['login'] . '</br></div>';
                // echo '<div class="info-user">'.'votre adresse mail: ' . $_SESSION['user'][0]['email'] . '</br></div>';

            }
            ?>
        </div>
    </div>

        <!-- <div class="form-profil">     -->
                <!-- <div class="titre-profil-form">
                        <h1>MES INFORMATIONS</h1>
                </div> -->
            <div id="centre3">
                <div id = "form3">
                    <form action="connexion.php" method="post">
                        <input class="connect" type="text" id="email" name="email" value="<?php echo $_SESSION['user'][0]['email'];?>">

                        <input class="connect" type="text" id="login" name="login" value="<?php echo $_SESSION['user'][0]['login'];?>">

                        <input class="connect" type="password" id="password" name="password" placeholder="*********">

                        <input class="connect" type="password" id="confirmPassword" name="confirmPassword" placeholder="**********">

                        <input type="submit" value="update">
                    </form>
                </div>
            </div>

</main>
<?php require ('footer.php');?>
</body>
</html>