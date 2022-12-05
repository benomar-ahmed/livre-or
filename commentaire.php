<?php


session_start();
include 'connect.php';

if(isset($_POST['submit'])){
    $id = $_SESSION['id'];
    $date = date("Y-m-d H:i:s");
    $commentaire = $_POST['commentaire'];


    $resultat = mysqli_query($mysqli,"INSERT INTO `commentaires` (`id`,`commentaire`,`id_utilisateur`,`date`) VALUES (NULL,'$commentaire','$id','$date');");
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
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


        <h1>Ajout de commentaire </h1>
        <form action="" method="post">
            <label for="commentaire">Entrez votre commentaire :</label>
            <input type="text" name="commentaire" id="comment">

            <input type="submit" value="Envoyez le commentaire" name="submit">
        </form>
    </main>

    <footer>
        <img src="Images/icon-github.png" alt="Icone du repository github">
    </footer>
</body>
</html>