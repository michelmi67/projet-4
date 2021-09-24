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
        <h1>Bienvenue sur le blog de Jean Forteroche !</h1>
        <h3>acteur et écrivain</h3>
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
        ?>
        <?php
  
        ?>
        <form method = "post" action = "#">    
            <textarea id = "modif_titre" name = "modif_titre" placeholder = "Inserer votre Titre" >
                <?php
                //Récupération du Titre
                $req = $db->prepare('SELECT id,titre FROM article where id = ?');
                $req->execute(array($_GET['texte']));
                $donnees = $req->fetch();
                echo $donnees['titre'];
                $req->CloseCursor();
                //modification titre
                if($_POST)
                {
                    
                    $req = $db->prepare('UPDATE article SET titre = ? WHERE id = ?');
                    $req->execute(array($_POST['modif_titre'],$_GET['texte']));
                    $req->CloseCursor();
                }
                ?>
            </textarea>
            <textarea id = "modif_texte" name = "modif_texte" placeholder = "Ecriver votre texte">
            <?php
                //Récupération du contenu
                $req = $db->prepare('SELECT id,texte FROM article WHERE id = ?');
                $req->execute(array($_GET['texte']));
                $donnees = $req->fetch();
                echo $donnees['texte'];
                $req->CloseCursor();
                //modification article
                if($_POST)
                {
                    
                    $req = $db->prepare('UPDATE article SET texte = ? WHERE id = ?');
                    $req->execute(array($_POST['modif_texte'],$_GET['texte']));
                    $req->CloseCursor();
                }
                ?>
            </textarea>
            <input type = "submit" value = "modifier"/>
            </form>
            <!--Inclusion du footer -->
            <?php include('footer.php') ?>
            <!-- script pour le textarea titre -->
            <script>
                tinymce.init({
                selector: '#modif_titre',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table lists',
                max_height: 150,
                toolbar_mode: 'floating',
                });    
            </script>
            <!-- script pour le textarea texte -->
            <script>
                tinymce.init({
                selector: '#modif_texte',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table lists',
                min_height: 600,
                toolbar_mode: 'floating',
            });
            </script>
            <!-- javascript -->
            <script src = "js/main.js"></script>  
    </body>
</html>

