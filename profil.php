<?php
    session_start();
    $bdd=mysqli_connect('localhost','root','root','blog');
    mysqli_set_charset($bdd,'utf8');
    require ('header.php');
    $title = 'Profil';

// if (isset($_POST['logout']))
// {
//     session_destroy();
//     header('location:connexion.php');
// }


// echo ('<pre>');
// var_dump($_SESSION);
// echo ('</pre>');


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
<main>
    
    <div class="page-profil">
        <div class="conteneur1">    
            <div class="titre-profil">
                <h1> MON PROFIL</h1>
            </div>   
        <div class="info-profil">
            <?php

                if(isset($_SESSION['user']))
            {
                echo '<div class="info-user">'. $_SESSION ['user'][0]['login'] . ',</br> bienvenue dans votre espace personnel.'. '</br></div>';
                // echo '<div class="info-user">'.'votre login actuel est: ' . $_SESSION['user'][0]['login'] . '</br></div>';
                // echo '<div class="info-user">'.'votre adresse mail: ' . $_SESSION['user'][0]['email'] . '</br></div>';

            }
            ?>
        </div>
    </div>

        <!-- <div class="form-profil">     -->
            <div class="conteneur2">
            <div class="titre-profil-form">
                        <h1>MES INFORMATIONS</h1>
                    </div>
                <form action="profil.php" method="post" enctype="multipart/form-data">
                    
                    
                        <div class="allBoites-profil"> 
                        
                        
                                    <div class="boite">

                                        <label for="email">Email:</label></br>
                                        <input class="input" class="input-profil" type="text" id="email" name="email" value=<?php echo $_SESSION['user'][0]['email'];?>>
                                </div>
                                <div class="boite">
                                
                                        <label for="login">Login:</label></br>
                                        <input class="input" class="input-profil" type="text" id="login" name="login" value=<?php echo $_SESSION['user'][0]['login'];?>>
                                </div>
                       
                                 
                                <div class="boite">
                                        <label for="password">Password:</label></br>
                                        <input class="input" class="input-profil" type="password" id="password" name="password" placeholder="*********">
                                </div>
                                <div class="boite">      
                                
                                        <label for="confirmPassword">Confirmer password:</label></br>
                                        <input class="input" class="input-profil" type="password" name="confirmPassword" placeholder="********">
                                </div>          
                            
                                        <input class="butt-profil" type="submit" name="editer" value="Editer">
                                    
                                </div>
                               
                </form>
            </div>
        </div>        
    </div>    
</main>
</body>
</html>