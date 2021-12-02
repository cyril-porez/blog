<?php
session_start();

$bdd=mysqli_connect('localhost','root','root','blog');
mysqli_set_charset($bdd,'utf8');

if(isset($_POST["submit"]))
{
    $login=$_POST["login"];
    $password=$_POST["password"];

    if(!empty($_POST["login"]) && !empty($_POST["password"]))
    {
        $requete=mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login='$login");
        // le select all me permet de recup toute les infos  y compris le password qui va me servir pour decrypter le hash
        //et le where à comparer le login de post et les logins ds ma bdd
         
            $result=mysqli_fetch_assoc($requete);
            $recupPassword=$result["password"];
            //je dois recuperer ma le mot de passe crypté en bdd
        }
        if($result["password"]==$password){
            password_verify($password,$recupPassword);
            $_SESSION["user"]
            //header('location: index');
        }
        else
        {
            
        }
    else
    {
        echo "tous les champs doivent être remplis";
    }
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
    <h2>CONNEXION</h2>
    <form action="connexion.php" method="post">
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
                <
                <td>
                    <input type="submit" name="subit" value="Je me connecte" >
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>