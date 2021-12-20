<?php
    session_start();
    $bdd = mysqli_connect('localhost','root','root','blog');
    mysqli_set_charset($bdd,'utf8');
    require ('header.php');
    $title = 'Connexion';

    //if(isset($_POST["submit"])) {
       
            //$id_admin=1337; faire un inner join pour lier les colones id_droits de utilisateurs et id de la table droit. ?
        if(!empty($_POST["login"]) && !empty($_POST["password"])) {        
            $login = $_POST["login"];
            $password = $_POST["password"];            
            $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login='$login'");
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

<main>
    <h2>CONNEXION</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td align="right">
                    <label for="login">Login:</label>
                </td>
                <td>
                    <input type="text" name="login" placeholder="Votre login">
                </td>
            </tr>
            <tr>
                <td align="right"> 
                    <label for="password">Password:</label>
                </td>
                <td>
                    <input type="text" name="password" placeholder="Votre password">
                </td>
            </tr>
            <tr>
                
                <td align="right">
                    <input type="submit" name="subit" value="Je me connecte" >
                </td>
            </tr>
        </table>
    </form>
</main>    
</body>
</html>


