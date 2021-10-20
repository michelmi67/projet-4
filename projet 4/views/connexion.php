
<!DOCTYPE HTML>
<html lang = "fr">
    <head>
        <?php include('include/head.php')?>
    </head>
    <body class = "connexion">
        <div class = "container">
            <!--Inclusion du header -->
            <?php include('include/header.php'); ?>    
            <h1>connexion d'un administrateur</h1>
            <!--Formulaire d'inscription pour un admin -->
            <form method = "post" action = "?action=connexion">
                <p>
                    <label for = "email_connexion">Email </label><input type = "email" name = "email_connexion" id = "email_connexion" required/><br><br>
                    <label for = "pass_connexion">Mot de passe </label><input type = "password" name = "pass_connexion" id = "pass_connexion" required/><br><br>
                    <button class="btn btn-secondary" type = "submit" value = "envoyé">envoyer</button>
                </p>
            </form>
            <?php
            if(isset($message_erreur))
            {
                echo $message_erreur;
            }
            ?>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>
        <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>