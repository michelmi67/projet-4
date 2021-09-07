<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
    ?>
<!DOCTYPE html>

<html lang="fr" id = >
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
    <!--Inclusion du header -->
    <?php include('header.php'); ?>
    <body class = "interface">
        <h1>Bienvenue sur le blog de Jean Forteroche !</h1>
        <h3>acteur et écrivain</h3>
        <div class = "button">
            <button><a href = "index.php">Accueil</a></button>
            <form action = "Deconnection.php" method = "post">
                <button type = "submit">Déconnection</button>
            </form>
        </div>
        <form method = "get" action = "">    
            <textarea id = "titre" name = "titre" placeholder = "Inserer votre Titre" ></textarea>
            <textarea id = "chapitre" name = "chapitre" placeholder = "Ecriver votre chapitre"></textarea>
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
         <!-- script pour le textarea chapitre -->
        <script>
            tinymce.init({
            selector: '#chapitre',
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
              //Envoie d'un titre et chapitre
                $req = $db->prepare('INSERT INTO chapitre (titre,article) VALUES (?,?)');
                $req->execute(array($_GET['titre'],$_GET['chapitre']));
            }
        ?>

        <?php var_dump($_SESSION['id']); ?>   
    </body>
</html>

