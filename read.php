<?php
    session_start();
    $connex =mysqli_connect("localhost", "root", "root", "blog");
    mysqli_set_charset($connex, 'utf8');
    require ('header.php');
    $title = 'Admin Read';

    $user = $_GET["read"];
    $data = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id='$user'");
    $info = mysqli_fetch_all($data, MYSQLI_ASSOC);

    if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>
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
</body>
</html>