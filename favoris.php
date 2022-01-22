<?php
    session_start();
    require ('bdd.php');
    require ('header.php');

    $requete_favoris = mysqli_query($connex, "SELECT articles.id, article, login, nom, date from articles inner join utilisateurs on articles.id_utilisateur = utilisateurs.id inner join categories on articles.id_categorie = categories.id inner join favoris on favoris.id_article = articles.id where favoris.id_utilisateur = 14 ");
    $favoris = mysqli_fetch_all($requete_favoris, MYSQLI_ASSOC);?>
    <div id="flex_favoris">
        <?php  foreach ($favoris as $favori) {?>
                <form class="favoris" action="article.php" method="get">
                    <div id="container-articles">
                        <div id="container-articles2">
                            <div class="postepar">
                                <p>Posté par:
                                    <?php echo $favori['login']; ?></p>
                            </div>
                            <div class="postele">
                                <p>Posté le :
                                <?php echo $favori['date']; ?></p>
                            </div>
                        </div>
                        <div class="cat_art">
                            <p>Catégorie : <?php echo $favori['nom']; ?></p>
                        </div>
                        <div class="art_bnt">
                            <?php echo $favori['article']; ?></p>
                        </div>
                        <div class="position--bnt">
                            <button class="bnt_a" name="article" value='<?php echo $favori['id']; ?>'>Article</button>
                        </div>
                    </div>
                </form>
    <?php
    }?>
</div>

<?php require('navbar.php'); ?>
<?php require('footer.php'); ?>