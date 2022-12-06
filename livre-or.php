<?php


include 'connect.php';

$resultat = mysqli_query($mysqli,"SELECT DATE_FORMAT(`date`,'%d/%m/%Y'), `login`, `commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC; ");
$row = $resultat->fetch_all();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
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

        <h1>Livre d'or</h1>
        <table>
            <thead>
                <th>Posté le :</th>
                <th>Par l'utilisateur :</th>
                <th>Commentaires</th>
            </thead>
            <tbody>
                <?php
                for ($i=0; isset($row[$i]) ; $i++) { 
                    echo "<tr>";
                    for ($j=0; isset($row[$i][$j]) ; $j++) 
                    { 
                        echo "<td>" . $row[$i][$j] . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="commentaire.php">Ajout de commentaire</a>
    </main>

    <footer>
        <img src="Images/icon-github.png" alt="Icone du repository github">
    </footer>
</body>
</html>