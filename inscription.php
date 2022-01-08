<?php
session_start();
$bdd=mysqli_connect('localhost','root','','blog');
mysqli_set_charset($bdd,'utf8');
require ('header.php');
$title = 'Inscription';

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
<style>

</style>
<main>
<div class="page">
    <div class="form-in-co">
        <div class="champs-form">
                <form action="inscription.php" method="post">
                    <div class="titre-form">
                        <h2>SIGN IN</h2>
                    </div>    
                        <div class="separation"></div>
                        <div class="allBoites">
                            <div class="boite">
                               
                             
                                <input class ="input-in-co" type="email" name="email" placeholder="Email" required>
                                <i class="fas fa-envelope"></i>
                            </div>
                         
                            <div class="boite">
                                
                                <input class ="input-in-co" type="text" name="login" placeholder="Login"> 
                                <i class="fas fa-user"></i>
                            </div>
                        
                            <div class="boite">
                                
                                <input class ="input-in-co" type="text" name="password" placeholder="Password">
                                <i class="fas fa-key"></i>   
                            </div>

                            <div class="boite">
                                <input class ="input-in-co" type="text" name="confirmPassword" placeholder="Confirm password">
                                
                                <i class="fas fa-key"></i>
                                <div class="boiteKey">
                                <i class="fas fa-check"></i>
                                </div>
                               
                            </div>
                        </div>    
                            <div class="separation"></div>

                      
                            <input class ="butt" type="submit" name="submit" value="SUBMIT">         
                </form>
        </div>    
    </div>
</div>    
</main>
</body>
</html>