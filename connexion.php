<?php
    session_start();
    require ('bdd.php');
    require ('header.php');
    $title = 'Connexion';

    //if(isset($_POST["submit"])) {
       
            //$id_admin=1337; faire un inner join pour lier les colones id_droits de utilisateurs et id de la table droit. ?
        if(!empty($_POST["login"]) && !empty($_POST["password"])) {        
            $login = $_POST["login"];
            $password = $_POST["password"];            
            $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login='$login'");
            // le select all me permet de recup toute les infos  y compris le password qui va me servir pour decrypter le hash
            //et le where à comparer le login de post et les logins ds ma bdd
            $result = mysqli_fetch_all($requete, MYSQLI_ASSOC);
            $recupPassword = $result[0]["password"];
            //je dois recuperer ma le mot de passe crypté en bdd
            if(password_verify($password,$recupPassword)) {
                $_SESSION["user"]=$result;
                header('location: index.php');
              
            }
            else {
                echo "Le mot de passe est incorrect";
            }
        }
        /*else if($login== && $password==) {   
          $_SESSION["user"]["id_droits"];
        } */   
   
        else if (isset($_POST["login"]) || isset($_POST["password"]))
        {
            echo "tous les champs doivent être remplis";
        }
    //}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form1.css">
    <title>Document</title>
</head>
<body>
    <?php require ('header.php')?>
    <main>
    <?php require ('navbar.php')?>
        <div class="centre">
            <div class = "form">
                <form action="connexion.php" method="post">
                    <input class="connect" type="text" id="login" name="login" placeholder="Login">

                    <input class="connect" type="password" id="password" name="password" placeholder="password">

                    <input type="submit" value="connexion">
                </form>
                <p>Si vous n'êtes pas inscrit <a href="inscription.php">inscrivez-vous !</a></p>
            </div>
        </div>
    </main>
        <?php
        require ('footer.php');
         ?>
</body>
</html>