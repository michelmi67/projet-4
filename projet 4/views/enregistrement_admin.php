<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang = "fr">
    <head>
        <title>Blog de Jean Forteroche</title>
        <meta charset = "utf-8"/>
    </head>
    <body>
        <header>
            <h1>Inscription d'un administrateur</h1>
        </header>
        <!--Formulaire d'inscription pour un admin -->
        <form method = "post" action = "enregistrement_admin.php">
            <p>
                <label for = "nom">Nom </label><input type = "text" name = "nom" id = "nom" required/><br><br>
                <label for = "prenom">Prénom </label><input type = "text" name = "prenom" id = "prenom" required/><br><br>
                <label for = "email">Email </label><input type = "email" name = "email" id = "email" required/><br><br>
                <label for = "pass">Mot de passe </label><input type = "password" name = "pass" id = "pass" required/><br><br>
                <label for = "pass_verification">Vérification du mot de passe </label><input type = "password" name = "pass_verification" id = "pass_verification" required/><br><br>
                <input type = "submit" value = "envoyé"/>
            </p>
        </form>

        <?php
        //Connection à la base de données
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root','');
        }
        catch(Exeption $e)
        {
            die('Erreur : ' .$e->getMessage());
        }

        //Enregistrement d'un admin

        //Si des données sont envoyés
        if($_POST){
            //Instanciation des variables
            $nom = htmlspecialchars($_POST['nom']) ;
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['pass']);
            $mdp_verification = htmlspecialchars($_POST['pass_verification']);

            //Si les deux mots de passe renseignés sont les mêmes
            if($mdp === $mdp_verification)
            {
                //on hache le mot de passe
                $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);

                //Puis on créer un nouveau admin
                $req = $db->prepare('INSERT INTO admin (nom,prenom,email,pass) VALUES (?,?,?,?)');
                $req->execute(array($nom,$prenom,$email,$mdp_hache));
                echo 'Nouveau admin enregistré !';
                header('Location:connection.php');
            }
            else
            {
                echo 'Les mots de passe ne sont pas identiques';
            }
            $req->CloseCursor();
        }
        ?>
    </body>
</html>