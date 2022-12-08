<?php

session_start();
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
    <link rel="stylesheet" href="livreor.css">
    <title>Accueil</title>
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

    <main id="main-livreor">

        <h1>Livre d'or</h1>
        <table id="table-livreor">
            <thead id="en-tête_livreor">
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
        <a href="commentaire.php" id="add-comment">Ajout de commentaire</a>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>