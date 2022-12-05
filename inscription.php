<?php

include 'connect.php';




if(isset($_POST['submit'])){
    


    $login = $_POST['login'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify-password'];


    if($password == $verify_password){
        $resultat1 = mysqli_query($mysqli,"SELECT login FROM utilisateurs;");
        $row = $resultat1->fetch_all();
        $resultat2 = mysqli_query($mysqli,"SELECT login FROM utilisateurs WHERE login='$login';");
        $row1 = $resultat2->fetch_all();

        if($row1 == true){
            echo "L'utilisateur existe déjà";
        }

        else {
            $resultat = mysqli_query($mysqli,"INSERT INTO utilisateurs (`login`,`password`) VALUES ('$login','$password')");
            header("Location : connexion.php");
        }
    }

    else {
        echo "Les mot de passe ne sont pas identiques !";
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
                <li><a href="commentaire.php">Commentaire</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>


        <h1>Inscription</h1>
        <form action="" method="post">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login-inscription" required="required">

            <label for="password">Password :</label>
            <input type="password" name="password" id="password-inscription" required="required">

            <label for="verify-passsword">Retapez votre password :</label>
            <input type="password" name="verify-password" id="verify-password-inscription" required="required">

            <input type="submit" value="Créer mon compte" name="submit">
        </form>
    </main>

    <footer>
        <img src="Images/icon-github.png" alt="Icone du repository github">
    </footer>
</body>
</html>