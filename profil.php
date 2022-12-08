<?php

session_start();
include 'connect.php';
$msg=[];
if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    $resultat = mysqli_query($mysqli,"UPDATE utilisateurs SET login='$login',password = '$password' WHERE login='".$_SESSION['login']."'");
    
    if(isset($_SESSION['login'])){
        $msg[0]="Votre profil à été mis à jour ".$_SESSION['login'];
    }

    else{
        $msg[1]="Ce n'est pas possible de mettre à jour votre profil connecter vous !";
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
    <title>Profil</title>
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

    <main id="main-profil">
        <span id="echo-profil"><?php echo "Vous êtes actuellement connecté sous le nom de : ".$_SESSION['login'] ?></span>

        <h1>Profil</h1>
        <form action="" method="post" id="form-main-profil">
            <label for="login">Login :</label>
            <input type="text" name="login" class="form-profil">

            <label for="password">Password :</label>
            <input type="password" name="password" class="form-profil">

            <input type="submit" value="Modifier" id="submit-profil" name="submit">
        </form>

        <!-- CODE PHP pour afficher les message d'erreurs -->
        <?php foreach($msg as $message):?>
           <div><?php echo ($message); ?></div>
         <?php endforeach; ?>

    </main>

    <?php include 'footer.php' ?>
</body>
</html>