<?php
    $connex = mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($connex, 'utf8');
    $error = "";

    $donneesUser = mysqli_query($connex, "SELECT * FROM utilisateurs");
    $infoUsers = mysqli_fetch_all($donneesUser, MYSQLI_ASSOC);
    //var_dump($infoUsers);

    if (!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["id_droits"]) && !empty($_POST["confirmPassword"])) {
        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $idDroit = $_POST["id_droits"];
        $requete = mysqli_query($connex, "SELECT login From utilisateurs WHERE login = '$login'");
        $requet2 = mysqli_query($connex, "SELECT email FROM utilisateurs WHERE email = '$email'");
        $verifLogin = mysqli_fetch_all($requete, MYSQLI_ASSOC);
        $verifEmail = mysqli_fetch_all($requet2, MYSQLI_ASSOC);
        
        if (count($verifLogin) == 0) {
            if (count($verifEmail) == 0) {
                if($password == $confirmPassword) {
                    $hash = password_hash($password, PASSWORD_ARGON2I);
                    $creeUser = mysqli_query($connex, "INSERT into utilisateurs (login, password,  email, id_droits) VALUES ('$login', '$hash', '$email', '$idDroit')");
                    header("Location: admin.php");
                    //var_dump($creeUser);
                }
                else {
                    $error = "* error password";
                }
            }
            else {
                $error = "* un compte avec cet email existe déjà";
            }
        }
        else {
            $error = "* Ce login existe déjà";
        }
    }
    else if (isset($_POST["login"]) || isset($_POST["email"]) || isset($_POST["password"]) && isset($_POST["id_droits"])) {
        $error = "* oublis de champs";
    }

    if (isset($_POST["creerCatégorie"])) {
        header("Location: categorie.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="admin.php" method="post">
            <input type="submit" name="createUser" value="Créer un utilisateur">
            <input type="submit" name="afficheUser" value="Afficher les utilisateurs">
            <input type="submit" name="creerCatégorie" value="categorie">
            <input type="submit" name="X" value="X">
        </form>

        <?php
            if (isset($_POST["createUser"])) {
                echo "
                <form action='admin.php' method='post'>
                    <input type='text' name='login' placeholder='login'>
                    <input type='email' name='email' placeholder='email' value='defaut@exemple.com'>
                    <input type='text' name='id_droits' placeholder='id_droits'>
                    <input type='text' name='password' placeholder='password'>
                    <input type='text' name='confirmPassword' placeholder='confirPassword'>            
                    <input type='submit' name='bouton' value='créer'>
                </form>";
            }
                echo "<p>" . $error . "</p>";
                if (isset($_POST["afficheUser"])) {

        ?>
       

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>login</th>
                    <th>email</th>
                    <th>id_droits</th>
                    <th>password</th>
                </tr>
            </thead>
            <tbody>                
                <?php
                    foreach($infoUsers as $infoUser) {
                        echo ' <tr>
                                    <td id="idAdmin" class="textAdmin">' . $infoUser["id"] . '</td>
                                    <td class="textAdmin">' . $infoUser["login"] . '</td>
                                    <td class="textAdmin">' . $infoUser["email"] . '</td>
                                    <td class="textAdmin">' . $infoUser["id_droits"] . '</td>
                                    <td class="textAdmin">' . $infoUser["password"] . '</td>'; ?>                       
                            
                                    <form action="read.php" method="get">
                                       <td><button type="submit" name="read" id="read" value=<?php echo $infoUser["id"] ?>>Lire</td>
                                    </form> 
                                    <form action="update.php" method="get">
                                        <td><button type="submit" name="update" id="update" value=<?php echo $infoUser["id"]; ?>>modifier</button></td>
                                    </form>
                                    <form action="delete.php" method="get">
                                        <td><button type="submit" name="delete" id="delete" value=<?php echo $infoUser["id"]; ?>>supprimer</button></td>
                                    </form>
                                </tr> <?php                          
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