<?php


session_start();
include 'connect.php';

if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    $resultat = mysqli_query($mysqli,"SELECT login,password FROM utilisateurs WHERE login='$login' and password='$password';");
    $row = $resultat->fetch_all();
    
    if($row == true) {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        echo "Bonjour ".$_SESSION['login'];
    }

    else {
        echo "Le login et/ou le mot de passe est incorrect !";
    }
}








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="">Livre-or</a></li>
                <li><a href="">Commentaire</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="" method="post">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login-connexion">

            <label for="password">Password :</label>
            <input type="password" name="password" id="password-connexion">

            <input type="submit" value="Se connecter" name="submit">
        </form>
    </main>

    <footer>
        <img src="Images/icon-github.png" alt="Icone du repository github">
    </footer>
</body>
</html>