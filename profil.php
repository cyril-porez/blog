<?php
    session_start();
    $bdd=mysqli_connect('localhost','root','root','blog');
    mysqli_set_charset($bdd,'utf8');

if (isset($_POST['logout']))
{
    session_destroy();
    header('location:connexion.php');
}


echo ('<pre>');
var_dump($_SESSION);
echo ('</pre>');
//  var_dump($_POST);

if(isset($_POST["editer"]))
{   
    
        $id=$_SESSION["user"]["id"];
        $email = $_POST["email"];
        $login = $_POST["login"];
        $password= $_POST["password"];
        $confirmPassword =$_POST["confirmPassword"];
       
       
        
        
        if(!empty($_POST["email"]) && !empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"]))
        {     
            $passwordCrypted = password_hash($password,PASSWORD_BCRYPT);
            $requete1=mysqli_query($bdd,"UPDATE utilisateurs SET  login='$login', password='$passwordCrypted', email='$email' WHERE id='$id'");

            $requete2=mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id='$id'");
         
                $result = mysqli_fetch_assoc($requete2);
                $recupPassword = $result["password"];
                
                $_SESSION["user"]=$result;
        }
}

?>
<h1> VOTRE PROFIL</h1>
<?php
    
    if(isset($_SESSION['user']))
{
    echo $_SESSION['user']['login'] . ', bienvenue chez vous!'. '</br>';
    echo 'votre login: ' . $_SESSION['user']['login'] . '</br>';
    echo 'votre adresse mail: ' . $_SESSION['user']['email'] . '</br>';

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
</head>
<body>
<main>

    <h2>MODIFICATIONS DE PROFIL</h2>

    <form action="profil.php" method="post" enctype="multipart/form-data">
        <table>
            <!-- <tr align=right>
                <td>
                    <label>Avatar:<label>
                </td>
                <td>
                    <input type="file" name="avatar"/>

                </td>
            </tr>     -->
            <tr align=right>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>    
                    <input type="text" id="email" name="email" value=<?php echo $_SESSION['user']['email'];?>>
                </td>
            </tr>
            <tr align=right>    
                <td>
                    <label for="login">Login:</label>
                </td>
                <td>    
                    <input type="text" id="login" name="login" value=<?php echo $_SESSION['user']['login'];?>>
                </td>
            </tr>
            <tr align=right>
                <td> 
                    <label for="password">Password:</label>
                </td>
                <td>    
                    <input type="password" id="password" name="password" placeholder="*********">
                </td>
            </tr>
            <tr align=right>   
                <td>    
                    <label for="confirmPassword">Confirmer password:</label>
                </td>
                <td>    
                    <input type="password" name="confirmPassword" placeholder="********">
                </td>  
            </tr>
            <tr>
                <td>
                    <input type="submit" name="editer" value="Editer mon profil">
                    <input type="submit" name="logout" value="deco">
                </td>
            </tr>
        </table>    
    </form>

        <?php

// $requete=mysqli_query($bdd,"SELECT * FROM articles");
// $array = [];
// $i = 0;

// while($result = mysqli_fetch_assoc($requete))
// {
//     $array[] = $result; 
// }
// echo 
// "
// <div style='display:flex; flex-direction:column;background-color:red;'>
// <h1>".$array[$i]['titre']."<h1/>
// <p>".$array[$i]['description']."</p>
// <img src='".$array[$i]['image']."'>
// <p style='color:blue;'>".$array[$i]['date']."</p>

// </div>
// ";


// for($i = 0; $i < 3; $i++)
// {
//     // echo '<pre>';
//     // var_dump($array);
//     // echo '</pre>';
    
//             echo 
//             "
//             <a href='profil.php?id=".$array[$i]['id']."' style='display:flex; flex-direction:column; background-color:grey; border: 1px solid blue'>
//             <h1>".$array[$i]['titre']."<h1/>
//             <img src='".$array[$i]['image']."'>
//             </a>
//             ";
//         }


                    ?>



        </main>
        
</body>
</html>