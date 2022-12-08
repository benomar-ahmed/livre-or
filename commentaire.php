<?php


session_start();
include 'connect.php';
?>
<?php if($_SESSION['id'] != NULL){ ?>
<?php
$msg=[];
if(isset($_POST['submit']) && !empty($_POST['commentaire'])){
    $id = $_SESSION['id'];
    $date = date("Y-m-d H:i:s");
    $commentaire = $_POST['commentaire'];


    $resultat = mysqli_query($mysqli,"INSERT INTO `commentaires` (`id`,`commentaire`,`id_utilisateur`,`date`) VALUES (NULL,'$commentaire','$id','$date');");
    $msg[0]="Votre commentaire à été posté !";
}







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livreor.css">
    <title>Commentaires</title>
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

    <main id="main-commentaire">
        <span id="echo-profil"><?php echo "Vous êtes actuellement connecté sous le nom de : ".$_SESSION['login'] ?></span>

        <h1>Ajout de commentaire </h1>
        <form action="" method="post" id="form-main-commentaire">
            <label for="commentaire">Entrez votre commentaire :</label>
            <input type="text" name="commentaire" class="form-profil">

            <input type="submit" value="Envoyez le commentaire" id="submit-commentaire" name="submit">
        </form>

        <!-- CODE PHP pour afficher les message d'erreurs -->
        <?php foreach($msg as $message):?>
           <div><?php echo ($message); ?></div>
         <?php endforeach; ?>

    </main>

    <?php include 'footer.php' ?>
</body>
</html>
<?php }
    else {
        header('Location: connexion.php');
    } 
    ?>