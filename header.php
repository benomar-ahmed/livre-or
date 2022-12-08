<nav>
    <ul>
        <?php if(isset($_SESSION['login']) == true) : ?>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="livre-or.php">Livre-or</a></li>
        <li><a href="deconnexion.php">Deconnexion</a></li>
        <?php else :?>
        <li><a href="index.php">Accueil</a></li>
        <li><a href='inscription.php'>Inscription</a></li>
        <li><a href='connexion.php'>Connexion</a></li>
        <li><a href="livre-or.php">Livre-or</a></li>
        <?php endif ?>

        </ul>
</nav>
