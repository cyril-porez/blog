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
<style>

</style>
<main>
    <div class=page>
        <div class="form-in-co">
            <div class="champs-form">
                <form action="connexion.php" method="post">
                    <div class="titre-form">
                        <h2>LOG IN</h2>
                    </div>    
                        <div class="separation"></div>
                            <div class="allBoites">
                                <div class="boite">
                                   <input class="input-in-co" type="text" name="login" placeholder="Votre login">
                                   <i class="fas fa-user"></i>
                                </div>
                                <div class="boite">
                                    <input class="input-in-co" type="text" name="password" placeholder="Votre password">
                                    <i class="fas fa-key"></i>   
                                </div>
                            </div>    
                        <div class="separation"></div> 

                                    <input class="butt-co"  type="submit" name="submit" value="SUBMIT" >
                           
                    </form>
            </div>
        </div>
    </div>
</main>    
</body>
</html>


