<?php
    $connex = mysqli_connect("localhost", "root","root", "blog");
    mysqli_set_charset($connex, 'utf8');    

    //Requete servant à récuperer le nbr d'article
    $requete2 = mysqli_query($connex, "SELECT count(id) as compteur_article from articles");
    $nbr_articles_totales = mysqli_fetch_all($requete2, MYSQLI_ASSOC);

    
    // création d'une variable pour fixer le nbr d'article par page
    $nbr_articles_par_pages = 5;

    // la fonction ceil permet d'arrondir au supérieur
    $nbr_pages =  ceil($nbr_articles_totales[0]["compteur_article"] / $nbr_articles_par_pages);
    //$nbr_page_par_categorie_articles = ;

    if (isset($_GET["start"])) {
        $page = $_GET["start"];
    }    
    else {
        $page = 0;
    }


   
    //var_dump($articles);
    if (ceil($page/ $nbr_articles_par_pages) > $nbr_pages || $page < 1) {
      //  header("Location: articles.php");
    }

    // requete pour récupérer les infos de la categorie
    $requete3 = mysqli_query($connex, "SELECT * from categories");
    $categories = mysqli_fetch_all($requete3, MYSQLI_ASSOC);
    //var_dump($categories);
    //var_dump($debut);

    if (isset($_GET["categorie"])) {
        $id_categorie = $_GET["categorie"];   
        //requete permettant de récupérer les articles par catégorie par date decroissante limité à 5
        $requete = mysqli_query($connex, "SELECT articles.id, article, nom, date, login  from articles inner join utilisateurs on articles.id_utilisateur = utilisateurs.id inner join categories on articles.id_categorie = categories.id  where id_categorie = $id_categorie ORDER BY date desc limit $nbr_articles_par_pages OFFSET $page");
        $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
        //var_dump($debut);
    }
   
    else {
        //requete permettant de récupérer les articles par date decroissante limité à 5
        $requete = mysqli_query($connex, "SELECT articles.id, article, nom, date, login  from articles inner join utilisateurs on articles.id_utilisateur = utilisateurs.id inner join categories on articles.id_categorie = categories.id ORDER BY date desc limit  $nbr_articles_par_pages OFFSET $page");
        $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
        // var_dump($articles);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="articles.css">
    <title>ARTICLES</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <form action="" method="get">
                <select name="categorie">
                    <option>Choisir une catégorie d'article</option>
                    <?php
                        foreach($categories as $categorie) {?>
                           <option value="<?=$categorie['id']?>"> <?= $categorie['nom']?></option>;
                       <?php }
                    ?>
                     <input class="input1" type="submit"  value="executer">
                </select>               
            </form>
        </div>
        <div>
            <?php 
                foreach ($articles as $article) { ?>
                    <form action="article.php" method="get">
                        <div id="container">
                            <div id="container2">
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
                            <button name="article" value='<?php echo $article['id']; ?>'>Article</button>
                        </div>                
                    </form><?php
                }
            ?>
        </div>
        <div id="pagination">
            <?php
                if (isset($_GET["categorie"])) {
                    $id_categorie = $_GET["categorie"];
                    //Requete servant à compter le nbr d'articles par categorie
                    $requete_count = mysqli_query($connex, "SELECT count(article) as nbr_article_categorie, categories.nom from articles inner join categories on id_categorie = categories.id where id_categorie = $id_categorie LIMIT 5;");
                    $nbr_article_par_categorie = mysqli_fetch_all($requete_count, MYSQLI_ASSOC);
                    $nbr_pages =  ceil($nbr_article_par_categorie[0]["nbr_article_categorie"] / $nbr_articles_par_pages);

                    $five = 0;
                    for ($i = 1; $i <= $nbr_pages; $i++)
                    {
                        echo " <a href=articles.php?categorie=".$id_categorie."&start=".$five.">$i</a>&nbsp";
                        $five = $five + 5;
                    }       
                }
                else {
                    $i = 1;
                    $five = 0;
                    while ($i <= $nbr_pages ) 
                    { 
                        echo " <a href='?start=$five'>$i</a>&nbsp";
                            $five = $five + 5;
                            $i++;
                    }
                }

            ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>