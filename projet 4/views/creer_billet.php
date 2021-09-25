<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
    ?>
<!DOCTYPE html>

<html lang="fr"  >
    <head>
        <meta charset="UTF-8"/>
        <title>Projet 4</title>
        <meta name="description" content="&&&&&&"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link rel="stylesheet" href="css/style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <script src="https://cdn.tiny.cloud/1/03puxw65ydbv9n6fvxcaqfxnd9h3hk5c1hjm1afabuf62exq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
    <body class = "interface">
        <!--Inclusion du header -->
        <?php include('header.php'); ?>
        <h1>Creation d'un billet</h1>
        <form method = "get" action = "creer_billet.php">    
            <textarea id = "titre" name = "titre" placeholder = "Inserer votre Titre" ></textarea>
            <textarea id = "texte" name = "texte" placeholder = "Ecriver votre texte"></textarea>
            <input type = "submit" value = "envoyé"/>
        </form>
        <!-- script pour le textarea titre -->
        <script>
            tinymce.init({
            selector: '#titre',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table lists',
            max_height: 150,
            toolbar_mode: 'floating',
            });    
        </script>
         <!-- script pour le textarea texte -->
        <script>
            tinymce.init({
            selector: '#texte',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table lists',
            min_height: 600,
            toolbar_mode: 'floating',
        });
        </script>

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

            //Si des données sont envoyé
            if($_GET)
            {
              //Envoie d'un titre et d'un texte
                $req = $db->prepare('INSERT INTO article (titre,texte) VALUES (?,?)');
                $req->execute(array($_GET['titre'],$_GET['texte']));
            }
        ?>
        <!--Inclusion du footer -->
        <?php include('footer.php') ?>
        <!-- javascript -->
        <script src = "js/main.js"></script>  
    </body>
</html>

