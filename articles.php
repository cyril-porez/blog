<?php
    $connex = mysqli_connect("localhost", "root","", "blog");
    $requete = mysqli_query($connex, "SELECT * FROM articles");
    $articles = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    var_dump($articles);
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
    
</body>
</html>