<?php

include 'connect.php';

$msg=[];

if(isset($_POST['submit'])){
    

    
    $login = $_POST['login'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify-password'];


    if($password == $verify_password){
        $resultat2 = mysqli_query($mysqli,"SELECT login FROM utilisateurs WHERE login='$login';");
        $row1 = $resultat2->fetch_all();

        if($row1 == true){
            $msg[0]="L'utilisateur existe déjà";
        }

        else {
            $resultat = mysqli_query($mysqli,"INSERT INTO utilisateurs (`login`,`password`) VALUES ('$login','$password')");
            header('Location: connexion.php');
        }
    }

    else {
        $msg[1]="Les mot de passe ne sont pas identiques !";
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
    <title>Inscription</title>
</head>
<body>
    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <header>
        <?php include 'header.php'?>
    </header>

    <main id="main-inscription">

        <h1>Inscription</h1>
        <form action="" method="post" id="form-main-inscription">
             
            <label for="login">Login :</label>
            <input type="text" name="login" class="form-inscription" required="required">

            <label for="password">Password :</label>
            <input type="password" name="password" class="form-inscription" required="required">

            <label for="verify-passsword">Retapez votre password :</label>
            <input type="password" name="verify-password" class="form-inscription" required="required">

            <input type="submit" value="Créer mon compte" id="submit-inscription" name="submit">
        </form>


        <!-- CODE PHP pour afficher les message d'erreurs -->
        <?php foreach($msg as $message):?>
           <div><?php echo ($message); ?></div>
         <?php endforeach; ?>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>