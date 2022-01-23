<?php
    session_start();
    require ('bdd.php');
    
    $title = 'Profil';
    $userConnect = $_SESSION["user"][0]["login"];
   
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$userConnect'");
    $infoUser = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    
    $errorLog = "";
    $errorEmail = "";
    $errorPass = "";
    
    if (!empty($_POST["login"])) {
        $login = $_POST["login"];
        $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$login'");
        $verifLogin = mysqli_fetch_all($requete, MYSQLI_ASSOC);
        
        if (count($verifLogin) == 0) {
            $update = mysqli_query($connex, "UPDATE utilisateurs SET login = '$login' WHERE login ='$userConnect'");
            $_SESSION["user"] = [
                                    0 => ['id' => $infoUser[0]['id'], 
                                          'login' => $login, 
                                          'password' => $infoUser[0]['password'],
                                          'email' => $infoUser[0]['email'],
                                          'id_droits' => $infoUser[0]['id_droits'],
                                         ]
                                    ];
               // header("refresh: 0");
        }
        else {
            $error_log = "* Ce login existe déjà";
        }
    }
    else if (!empty($_POST["email"])) {
        $email = $_POST["email"];
        $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE email = '$email'");
        $verifEmail = mysqli_fetch_all($requete, MYSQLI_ASSOC);

        if (count($verifEmail) == 0) {
            $update = mysqli_query($connex, "UPDATE utilisateurs SET email = '$email' WHERE login ='$userConnect'");
            $_SESSION["user"] = [
                0 => ['id' => $infoUser[0]['id'], 
                      'login' => $infoUser[0]['login'], 
                      'password' => $infoUser[0]['password'],
                      'email' => $email,
                      'id_droits' => $infoUser[0]['id_droits'],
                     ]
            ];
        }
        else {
            $errorEmail = "* Un compte avec cet email existe déjà";
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
        else {
            $errorPass = "* Les deux mots de passes ne correspondent pas";
        }

    }   
    else if (isset($_POST["email"]) || isset($_POST["password"]) || isset($_POST["confirmPassword"]) || isset($_POST["login"])) {
        $errorLog = "* oublis dans l'un des champs";
        $errorPass = "* oublis dans l'un des champs";
        $errorEmail = "* oublis dans l'un champs";
    }
?>

<html>
<body>
    </header>
        <?php require ('header.php'); ?>
    <header>
        <main id="main3">
            <div class="page-profil">
            <?php
                if(isset($_SESSION['user']))
                {
                    echo '<div class="info-user">'. $_SESSION ['user'][0]['login'] . ',</br> bienvenue dans votre espace personnel.'. '</br></div>';
                }
            ?>
        </div>
    <!--
    <div id="centre3">
        <div id = "form3">
            <form action="profil.php" method="post">
                <fieldset>
                    <legend>Modifer votre Email</legend>
                        <input class="connect" type="text" id="email" name="email" value="<?php echo $_SESSION['user'][0]['email'];?>">
                        <input type="submit" name="modifEmail" value="Modifer">                   
                </fieldset>
            </form>
            <form action="profil.php" method="post">
                <fieldset>
                    <legend>Modifier votre Pseudos</legend>
                    <input class="connect" type="text" id="login" name="login" value="<?php echo $_SESSION['user'][0]['login'];?>">
                    <input type="submit" name="modifLogin" value="Modifier">
                </fieldset>
            </form> 
            <form action="profil.php" method="post">    
                <fieldset>
                    <legend>modifier votre mot de passe</legend>
                    <input class="connect" type="password" id="password" name="password" placeholder="*********">
                    <input class="connect" type="password" id="confirmPassword" name="confirmPassword" placeholder="**********">
                    <input type="submit" name="modifierPassword" value="Modifer">
                </fieldset>
            </form>
        </div>
    </div>-->

    <h2>Modifier son profil:</h2>
        <div id="formu_login">
            <fieldset class="entete">
                <legend><p class="titre"><b>LOGIN</b></p></legend>
                <form action="profil.php" method="post" id="formLogin">
                    <input type="text" name="login" placeholder="login" class="champs" value=<?php echo $_SESSION["user"][0]["login"]; ?>>
                    <input type="submit" name="update_login" value="editer" class="bouton">
                    <?php
                        echo "<p>$errorLog</p>";
                    ?>
                </form>
            </fieldset>
        </div>
        <div id="formu_login">
            <fieldset class="entete">
                <legend><p class="titre"><b>Email</b></p></legend>
                <form action="profil.php" method="post" id="formEmail">
                    <input type="text" name="email" placeholder="email" class="champs" value=<?php echo $_SESSION["user"][0]["email"]; ?>>
                    <input type="submit" name="update_email" value="editer" class="bouton">
                    <?php
                        echo "<p>$errorEmail</p>";
                    ?>
                </form>
            </fieldset>
        </div>
        <div id="formu_password">
            <fieldset class="entete"> 
                <legend><p class="titre"><b>PASSWORD</b></p></legend>
                <form action="profil.php" method="post" id="formPassword">            
                    <input type="text" name="password" placeholder="password" class="champs">
                    <input type="text" name="confirmPassword" placeholder="confirmPassword" id="confirmPass" class="champs">
                    <input type="submit" name="update" value="editer" class="bouton">
                    <?php
                        echo "<p>$errorPass</p>";
                    ?>
                </form>
            </fieldset>
        </div>
    </main>

</main>
<footer>
    <?php
        require ('footer.php');
    ?>
</footer>
</body>
</html>