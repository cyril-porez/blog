<?php
$bdd=mysqli_connect('localhost','root','root','blog');
mysqli_set_charset($bdd,'utf8');




$requete= mysqli_query($bdd, "SELECT * FROM utilisateurs");

if(isset($_POST["submit"]))
{
        if( !empty($_POST["email"]) && !empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"]))
        {

            $email=$_POST["email"];
            $login=$_POST["login"];
            $password=$_POST["password"];
            $confirmPassword=$_POST["confirmPassword"];
            $id_droits= 1;

            $requete3=mysqli_query($bdd,"SELECT email FROM utilisateurs WHERE email='$email'");
            $result3=mysqli_fetch_all($requete3);
                             
            if($password==$confirmPassword)
            {
                $passwordCrypted = password_hash($password,PASSWORD_BCRYPT);

                if(count($result3)==0)
                {
                    echo "yo";
                    $requete4=mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login='$login'");
                    $result4=mysqli_fetch_all($requete4);

                    if(count($result4)==0)
                    {   
                        echo "yo2";
                        $requete2 = mysqli_query($bdd ,"INSERT INTO utilisateurs (email,login,password,id_droits) Values ('$email','$login','$passwordCrypted','$id_droits')");
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2 align="center">INSCRIPTION</h2>

<form action="inscription.php" method="post">
    <table>
        <tr>
            <td align="right">
                <label for="email">Email:</label>
            </td>
            <td>
                <input type="email" name="email" placeholder="kevin-mitnick@protonmail.com" required>
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="login">Pseudo:</label>
            </td>
            <td>
                <input type="text" name="login" placeholder="Kev-bg-max">
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="password">Mot de passe:</label>
            </td>
            <td>
                <input type="text" name="password" placeholder="********">   
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for="confirmPassword">Confirmation de mot de passe:</label>
            </td>
            <td>
                <input type="text" name="confirmPassword" placeholder="********">
            </td>
        </tr>
      
        <tr>
            <td align="right">
                <input type="submit" name="submit" value="je m'inscris">
            </td>
        </tr>
    </table>
</form>

</body>
</html>