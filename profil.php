<?php

session_start();
include 'connect.php';

if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    $resultat = mysqli_query($mysqli,"UPDATE utilisateurs SET login='$login',password = '$password' WHERE login='".$_SESSION['login']."'");
    
    if(isset($_SESSION['login'])){
        echo "Votre profil à été mis à jour ".$_SESSION['login'];
    }

    else{
        echo "Ce n'est pas possible de mettre à jour votre profil connecter vous !";
    }
}









?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="livre-or.php">Livre-or</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>


        <h1>Profil</h1>
        <form action="" method="post">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login-connexion">

            <label for="password">Password :</label>
            <input type="password" name="password" id="password-connexion">

            <input type="submit" value="Modifier" name="submit">
        </form>
    </main>

    <footer>
        <img src="Images/icon-github.png" alt="Icone du repository github">
    </footer>
</body>
</html>