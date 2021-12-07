<?php
    $connex = mysqli_connect("localhost", "root", "", "blog");
    $user = $_GET["update"];
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id = '$user'");
    $infos = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    $error = "";
    var_dump($infos);
    echo $user;

    if (!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["droits"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"])) {
        $login = $_POST["login"];
        $email = $_POST["email"];
        $droits = $_POST["droits"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $requete2 = mysqli_query($connex, "SELECT login, email FROM utilisateurs WHERE login = '$login' and email = '$email'");
        $verif = mysqli_fetch_all($requete2, MYSQLI_ASSOC);
        var_dump($verif);
       // $recupLogin = $verif[0]['login'];

        $requete3 = mysqli_query($connex, "SELECT login FROM utilisateurs WHERE login = '$login'");
        $verifLogin = mysqli_fetch_all($requete3, MYSQLI_ASSOC);
        var_dump($verifLogin);
        $requete4 = mysqli_query($connex, "SELECT email FROM utilisateurs WHERE email = '$email'");
        $verifEmail = mysqli_fetch_all($requete4, MYSQLI_ASSOC);
        var_dump($verifEmail);
        if (count($verifLogin) == 0) {
            if (count($verifEmail) == 0) {
                if ($password == $confirmPassword) {
                    $hash = password_hash($password, PASSWORD_ARGON2I);
                    $update = mysqli_query($connex, "UPDATE utilisateurs set login = '$login', password = '$email', id_droits = '$droits', password = '$hash' WHERE id = '$user'");
                    //header("Refresh:0");
                    var_dump($update);
                }
                else {
                    $error = "* problème entre le mot de passe et la confirmation mot de passe";
                }
            }
            else {
                $error = "* un compte avec cet email existe déjà";
            }
        }
        else {
            $error = "* Ce login est déjà pris";
        }
    }

    if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="" method="post">
            <input type="text" name="login" placeholder="login" value=<?php echo $infos[0]['login']; ?>>
            <input type="text" name="email" placeholder="email" value=<?php echo $infos[0]['email']; ?>>
            <input type="text" name="droits" placeholder="droits" value=<?php echo $infos[0]['id_droits']; ?>>
            <input type="text" name="password"  placeholder="password">
            <input type="text" name="confirmPassword" placeholder=confirmPassword>
            <input type="submit" name="update" value="modifier">
            <input type="submit" name="back" value="retour">
            <?php
                echo $error;
            ?>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>