<?php


session_start();
include 'connect.php';
$msg=[];

if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    $resultat = mysqli_query($mysqli,"SELECT id,login,password FROM utilisateurs WHERE login='$login' and password='$password';");
    $row = $resultat->fetch_all();

    if($row == true) {
        $_SESSION['id'] = $row[0][0];
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        $msg[0]="Bonjour ".$_SESSION['login'];
    }
    

    else {
        $msg[1]="Le login et/ou le mot de passe est incorrect !";
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livreor.css">
    <title>Connexion</title>
</head>
<body>
    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <header>
        <?php include 'header.php' ?>
    </header>

    <main id="main-connexion">

        <h1>Connexion </h1>
        <form action="" method="post" id="form-main-connexion">
            <label for="login">Login :</label>
            <input type="text" name="login" class="form-connexion">

            <label for="password">Password :</label>
            <input type="password" name="password" class="form-connexion">

            <input type="submit" value="Se connecter" id="submit-connexion" name="submit">
        </form>

        <!-- CODE PHP pour afficher les message d'erreurs -->
        <?php foreach($msg as $message):?>
           <div><?php echo ($message); ?></div>
         <?php endforeach; ?>
         
    </main>

    <?php include 'footer.php' ?>
</body>
</html>