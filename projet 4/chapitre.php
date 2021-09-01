<?php 
    session_start();
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Projet 4</title>
        <meta name="description" content="&&&&&&"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <script src="https://cdn.tiny.cloud/1/03puxw65ydbv9n6fvxcaqfxnd9h3hk5c1hjm1afabuf62exq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
    <header>
    <div class = "connection">
            <button><a href = connection.php>Connection admin</a></button>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <button><a href = "creer_billet">Creation billet</a></button>
                <button><a href = "recup_chapitre.php">Interface chapitre</a></button>
                <button><a href = "recup_commentaire.php">Interface commentaire</a></button>
                <?php
            }
            ?>
        </div>
        <div class = "chapitre">
            <button><a href = index.php>Accueil</a></button>
            <button><a href = index_chapitre.php>Chapitres</a></button>
        </div>
    </header>
    <body class = "commentaire">
        <?php
            //connexion à la base de données
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root',''); 
            }
            catch(Exeption $e)
            {
                die('Erreur :' . $e->getMessage());
            }

            //récupération du chapitre
           $req = $db->prepare('SELECT id,titre,article FROM chapitre WHERE id = ?');
           $req->execute(array($_GET['chapitre']));
           $donnees = $req->fetch();
           echo $donnees['titre'];
           echo $donnees['article'];
        ?>
        <form method = "post" action = "">
            <input type = "text" name = "pseudo" id = "pseudo" placeholder = "Pseudo" required/></br></br>
            <textarea name = "commentaire" id = "commentaire" placeholder = "Votre commentaire" rows = "6" cols = "75" required></textarea></br></br>
            <input type = "submit" value = "envoyé"/>
            <?php 
            if($_POST)
            {

                //Envoi d'un commentaire
                $req = $db->prepare('INSERT INTO commentaire (id_chapitre,auteur,message) VALUES (?,?,?)');
                $req->execute(array($_GET['chapitre'],$_POST['pseudo'],$_POST['commentaire']));
            } 
            $req->CloseCursor();
            
            //recupération des commentaire
            $req = $db->prepare('SELECT auteur,message,DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM commentaire WHERE id_chapitre = ?');
            $req->execute(array($_GET['chapitre']));
            while($donnees = $req->fetch())
            {
                ?>
                    <table>
                        <tr>
                            <td>
                                </p><strong> Le <?php echo htmlspecialchars($donnees['date_creation_fr']), " par " , htmlspecialchars($donnees['auteur']);  ?> :</strong> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><?php echo htmlspecialchars($donnees['message']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class = "td_button">
                                <button><a href = "">signaler</a></button>
                            </td>
                        </tr>
                    </table>
                <?php

            }
            ?>
        </form>
    </body>
</html>