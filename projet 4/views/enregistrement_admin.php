<?php
session_start();
if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
?>
<!DOCTYPE HTML>
<html lang = "fr">
    <head>
        <?php include('include/head.php')?>
    </head>
    <body class = "enregistrement_admin">
        <div class = "container">
            <!--Inclusion du header -->
            <?php include('include/header.php'); ?>
            <h1>Inscription d'un administrateur</h1>
            <!--Formulaire d'inscription pour un admin -->
            <form method = "post" action = "#">
            <p>
                <label for = "nom">Nom </label><input type = "text" name = "nom" id = "nom" required/><br><br>
                <label for = "prenom">Prénom </label><input type = "text" name = "prenom" id = "prenom" required/><br><br>
                <label for = "email">Email </label><input type = "email" name = "email" id = "email" required/><br><br>
                <label for = "pass">Mot de passe </label><input type = "password" name = "pass" id = "pass" required/><br><br>
                <label for = "pass_verification">Vérification du mot de passe </label><input type = "password" name = "pass_verification" id = "pass_verification" required/><br><br>
                <button class="btn btn-secondary" type = "submit" value = "envoyé">envoyer</button>
            </p>
            <?php
            if(isset($message_erreur)){
                echo $message_erreur;
            }
            ?>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>
        <!-- javascript -->
        <script src = "js/main.js"></script>  
        </div>
        </form>
    </body>
</html>