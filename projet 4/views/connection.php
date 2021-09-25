<?php
session_start();

?>
<!DOCTYPE HTML>
<html lang = "fr">
    <head>
        <title>Blog de Jean Forteroche</title>
        <meta charset = "utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="../css/style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    </head>
    <body>
        <!--Inclusion du header -->
        <?php include('header.php'); ?>    
        <h1>Connection d'un administrateur</h1>
        <!--Formulaire d'inscription pour un admin -->
        <form method = "post" action = "connection.php">
            <p>
                <label for = "email_connection">Email </label><input type = "email" name = "email_connection" id = "email_connection" required/><br><br>
                <label for = "pass_connection">Mot de passe </label><input type = "password" name = "pass_connection" id = "pass_connection" required/><br><br>
                <input type = "submit" value = "envoyé"/>
            </p>
        </form>

        <?php
        //Connection à la base de données
        /*try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root','');
        }
        catch(Exeption $e)
        {
            die('Erreur : ' .$e->getMessage());
        }*/

        /*if($_POST)
        {
            //on récupère l'adresse email de l'admin
            $email_connection = htmlspecialchars($_POST['email_connection']);
            $req = $db->prepare('SELECT id,nom,prenom,email,pass FROM admin WHERE email = ?');
            $req->execute(array($email_connection));
            $donnees = $req->fetch();

            //recupération du mot de passe
            $pass_connection = htmlspecialchars($_POST['pass_connection']);
            $pass_correct = password_verify($pass_connection,$donnees['pass']);

            //si l'adresse email n'éxiste pas
            if(!$donnees)
            {
                echo 'mauvais identifiant ou mot de passe !';
                
            }
            else
            {
                //Si le mot de passe est correct on fait la connection
                if($pass_correct)
                {
                    echo 'vous êtes connecté !';
                    $_SESSION['id'] = $donnees['id'];
                    $_SESSION['nom'] = $donnees['nom'];
                    $_SESSION['prenom'] = $donnees['prenom'];
                    $_SESSION['email'] = $donnees['email'];
                    header('Location:index.php');     
                }
                else
                {
                    echo 'mauvais identifiant ou mot de passe !';
                }
            }
            $req->CloseCursor();
        }*/
        ?>
        <!--Inclusion du footer -->
        <?php include('footer.php') ?>
        <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>