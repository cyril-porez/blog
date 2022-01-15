<?php
session_start();
require ('bdd.php');
require ('header.php');
$title = 'Inscription';

$requete= mysqli_query($connex, "SELECT * FROM utilisateurs");

if(isset($_POST["submit"]))
{
        if( !empty($_POST["email"]) && !empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"]))
        {

            $email=$_POST["email"];
            $login=$_POST["login"];
            $password=$_POST["password"];
            $confirmPassword=$_POST["confirmPassword"];
            $id_droits= 1;

            $requete3=mysqli_query($connex,"SELECT email FROM utilisateurs WHERE email='$email'");
            $result3=mysqli_fetch_all($requete3);
                             
            if($password==$confirmPassword)
            {
                $passwordCrypted = password_hash($password,PASSWORD_BCRYPT);

                if(count($result3)==0)
                {
                    echo "yo";
                    $requete4=mysqli_query($connex,"SELECT login FROM utilisateurs WHERE login='$login'");
                    $result4=mysqli_fetch_all($requete4);

                    if(count($result4)==0)
                    {   
                        echo "yo2";
                        $requete2 = mysqli_query($connex ,"INSERT INTO utilisateurs (email,login,password,id_droits) Values ('$email','$login','$passwordCrypted','$id_droits')");  
                        header('location: connexion.php');
                    }
                    else
                    {
                        echo "Ce login est déjà utilisé";
                    }
                }
                else
                {
                    echo "Cet email n'est pas valide";
                }  
            }
            else
            {
                echo "Les mots de passe doivent être identiques";
            }

    }
    else
    {
        echo "tout les champs doivent être remplis";
    }
}
// $requete=mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login='$login'");
// $result=mysqli_fetch_all($requete);
// var_dump($result);


?>
<body>
    <main id="main2">
        <?php require ('navbar.php') ?>
    <div id="centre2">
            <div id = "form2">
                <form action="connexion.php" method="post">
                    <input class="connect" type="text" id="email" name="email" placeholder="email">

                    <input class="connect" type="text" id="login" name="login" placeholder="Login">

                    <input class="connect" type="password" id="password" name="password" placeholder="password">

                    <input class="connect" type="password" id="confirmPassword" name="confirmPassword" placeholder="confirm password">

                    <input type="submit" value="inscription">
                </form>
                <p id="p2">Si vous êtes déja inscrit <a href="connexion.php">connecter-vous !</a></p>
            </div>
        </div>
    </main>
    <?php require ('footer.php')?>
</body>
</html>