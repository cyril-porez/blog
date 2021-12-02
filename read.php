<?php
    $connex =mysqli_connect("localhost", "root", "", "blog");
    mysqli_set_charset($connex, 'utf8');
    $user = $_GET["read"];
    $data = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id='$user'");
    $info = mysqli_fetch_all($data, MYSQLI_ASSOC);

    if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>READ</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="" method="post">
            <input type="text" name="id" placeholder="id" value=<?php echo $info[0]['id']; ?>>
            <input type="text" name="login" placeholder="login" value=<?php echo $info[0]['login']; ?>>
            <input type="text" name="email" placeholder="email" value=<?php echo $info[0]['email']; ?>>
            <input type="text" name="id_droits" placeholder="id_droits" value=<?php echo $info[0]['id_droits']; ?>>
            <input type="text" name="password" placeholder="password" value=<?php echo $info[0]['password']; ?>>
            <input type="submit" name="back" value="retour">
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>