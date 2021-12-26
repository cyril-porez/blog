
<link href="css/footer.css" rel="stylesheet">
<footer>
    <div class="footer">
        <div class="footer1">
        Accueil<a href="<?php if($nomFichier != 'index.php'){ echo '../';}?>index.php"><img class="socialMedia" alt="Accueil" src="https://cdn-icons-png.flaticon.com/512/1239/1239292.png"></a>
        Articles<a href="<?php if($nomFichier == 'index.php'){ echo 'php/';}?>articles.php"><img class="socialMedia" alt="Articles" src="http://cdn.onlinewebfonts.com/svg/img_351420.png"></a>
        <?php if(empty($_SESSION['user'])){ echo 'Connexion<a href="'; if($nomFichier == "index.php"){ echo "php/";}; echo 'connexion.php"><img class="socialMedia" alt="Connexion" src="http://cdn.onlinewebfonts.com/svg/img_201469.png"></a>';}?>
        <?php if(empty($_SESSION['user'])){ echo 'Inscription<a href="'; if($nomFichier == "index.php"){ echo "php/";} echo 'inscription.php"><img class="socialMedia" alt="Inscription" src="https://www.vbvb.fr/wp-content/uploads/2016/04/icone_sinscrire.png"></a>';}?>
        <?php if(!empty($_SESSION['user'])){ echo 'Profil<a href="'; if($nomFichier == "index.php"){ echo "php/";} echo 'profil.php"><img class="socialMedia" alt="Profil" src="http://cdn.onlinewebfonts.com/svg/img_311846.png"></a>';}?>
        </div>
        <div class="footer2">
            <h2>Copyright © 2021 Naomi, Cyril & Carla. All Rights Reserved</h2>
        </div>
        <div class="footer3">
            <a href="https://twitter.com/"><img class="socialMedia" alt="Twitter" src="https://bassin-arcachon.com/wp-content/uploads/2017/02/logo-twitter-bleu.png"></a>
            <a href="https://facebook.com/"><img class="socialMedia" alt="Facebook" src="https://cdn.pixabay.com/photo/2015/05/17/10/51/facebook-770688_1280.png"></a>
            <a href="https://instagram.com/"><img class="socialMedia" alt="Instagram" src="https://pic.clubic.com/v1/images/1182568/raw"></a>
            <a href="https://youtube.com/"><img class="socialMedia" alt="Youtube" src="http://assets.stickpng.com/images/580b57fcd9996e24bc43c545.png"></a>
            <a href="https://github.com/hugo-chabert/blog"><img class="socialMedia2" alt="GitHub" src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg"></a>
        </div>
    </div>
</footer>
© 2021 GitHub, Inc.
Terms
Privacy
Security
