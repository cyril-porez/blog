<?php
    session_start();
    require ('bdd.php');
    require ('header.php');
    $title = 'Accueil';

    $requete = mysqli_query($connex, "SELECT articles.id, article, date, login, nom from articles inner join utilisateurs on id_utilisateur = utilisateurs.id inner join categories on id_categorie = categories.id  order by  articles.id desc limit 3");
    $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
?>
<body>
    <main>
        <?php require ('navbar.php')?>
        <!-- <a href ="deconnexion.php">DECO</a> -->
        <?php //header('location: connexion.php')?>
        <div id="bloc">
            <video autoplay muted loop>
                <source src="images/fusee.mp4" type="video/mp4" width="1920px">
            </video>
        </div>
        <div id="h1">
            <div>
                <h1 id="titre">Nos derniers articles</h1>
            </div>
        </div>
        <div class="flex">
        <?php
            foreach ($articles as $article) { ?>
                <div class="article">
                    <form action="article.php" method="get">
                        <div id="container">
                            <div class="container2">
                                <div>
                                    <p>Posté par:
                                    <?php echo $article['login']; ?></p>
                                </div>
                                <div>
                                    <p>Posté le :
                                    <?php echo $article['date']; ?></p>
                                </div>
                            </div>
                            <div>
                                <p>Catégorie : <?php echo $article['nom']; ?></p>
                            </div>
                            <div>
                                <?php echo $article['article']; ?></p>
                            </div>
                            <?php if(!empty($_SESSION)){
                           echo '<button name="article".$article[id]>Article</button>';
                            }?>
                        </div>
                    </form>
                </div>
                <?php
            } ?>
            </div>


        <!-- <div class="presentation">
           <div>
               <p>
                Bienvenue sur SPACENET ! Le blog qui parle d'aerospatiale, d'aeronautique et d'astronomie.
                Ici vous pourrez crée de nouveaux articles ou aussi bien commenter les articles qui sont
                déja présent mais attention il doivent tous concerner les mot de notre slogan "Aerospatiale",
                "Aeronautique" et "Astronomie".
                </p>
            </div>
        </div> -->
    </main>
        <?php require('footer.php') ?>
</body>
</html>