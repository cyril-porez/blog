<?php
    session_start();
    $bdd=mysqli_connect('localhost','root','','blog');
    mysqli_set_charset($bdd,'utf8');

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
<main>
<?php
    var_dump($_SESSION["user"]);
    var_dump($_SESSION);
    var_dump($_POST);

    if(isset($_POST["editer"]))
    {
        $id=$_SESSION['user']["id"];
        $email = $_POST["email"];
        $login = $_POST["login"];
        $password = $_POST["password"];
        $confirmPassword =$_POST["confirmPassword"];
        
        
        if(!empty($_POST["email"]) && !empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"]))
        {     
            $passwordCrypted = password_hash($password,PASSWORD_BCRYPT);
            $requete=mysqli_query($bdd,"UPDATE utilisateurs SET email='$email', login='$login', password='$passwordCrypted' WHERE id='$id'");

            $requete=mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id='$id'");
         
                $result = mysqli_fetch_assoc($requete);
                $recupPassword = $result["password"];
                
                $_SESSION["user"]=$result;
        }
    }
    
?>
                <form action="profil.php" method="post">
            
                        <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value=<?php echo $_SESSION['user']['email'];?>>
                        
                        <label for="login">Login:</label>
                            <input type="text" id="login" name="login" value=<?php echo $_SESSION['user']['login'];?>>
            
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="*********">

                        <label for="confirmPassword">Confirmer password:</label>
                        <input type="password" name="confirmPassword" placeholder="********">
            
                        <input type="submit" name="editer" value="Editer mon profil">
                </form>
                <?php
                    $requete=mysqli_query($bdd,"SELECT * FROM articles");
                    $array = [];
                    $i = 0;

                    while($result = mysqli_fetch_assoc($requete))
                    {
                        $array[] = $result; 
                    }
                        echo 
                                "
                                    <div style='display:flex; flex-direction:column;background-color:red;'>
                                        <h1>".$array[$i]['titre']."<h1/>
                                        <p>".$array[$i]['description']."</p>
                                        <img src='".$array[$i]['image']."'>
                                        <p style='color:blue;'>".$array[$i]['date']."</p>
                                    </div>
                                ";

                    for($i = 0; $i < 3; $i++)
                    {
                        // echo '<pre>';
                        // var_dump($array);
                        // echo '</pre>';
    
                        echo 
                             "
                                <a href='profil.php?id=".$array[$i]['id']."' style='display:flex; flex-direction:column; background-color:grey; border: 1px solid blue'>
                                <h1>".$array[$i]['titre']."<h1/>
                                <img src='".$array[$i]['image']."'>
                                </a>
                            ";
                    }
        ?>
        </main>
        
</body>
</html>