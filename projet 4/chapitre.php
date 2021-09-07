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
    <!--Inclusion du header -->
    <?php include('header.php'); ?>
    <body class = "chapitre">
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
            $req = $db->prepare('SELECT id,titre,article FROM chapitre  WHERE id = ?');
            $req->execute(array($_GET['chapitre']));
            $donnees = $req->fetch();
            echo $donnees['titre'];
            echo $donnees['article'];
            
            //bouton suivant et précédent
            $page_courante = (int)$_GET['chapitre'];
            $req = $db->query('SELECT COUNT(id) from chapitre');
            $donnees_2 = $req->fetch();
            $count = (int)$donnees_2;
            ?>
            <pre>
                <?php var_dump($donnees['id']); ?>
                <?php var_dump($page_courante); ?>
                <?php var_dump($donnees_2) ?>
                <?php var_dump($count); ?>
            </pre>
            <div class = "suivant_precedent">
                <?php 
                if($page_courante > 1){
                    ?>
                    <button><a href = "chapitre.php?chapitre=<?php echo $donnees['id']-1; ?>">précédent</a></button>
                    <?php
                }
                if($page_courante != $count-1){
                    ?>
                    <button><a href = "chapitre.php?chapitre=<?php echo $donnees['id']+1; ?>">suivant</a></button>
                    <?php
                }
                ?>
            </div>
        
        <h2>Commentaires</h2>
        <form method = "post" action = "">
            <input type = "text" name = "pseudo" id = "pseudo" placeholder = "Pseudo" required/></br></br>
            <textarea name = "commentaire" id = "commentaire" placeholder = "Votre commentaire" rows = "6" cols = "75" required ></textarea></br></br>
            <input type = "submit" value = "envoyé"/>
            <?php 
            if($_POST)
            {
                //Envoi d'un commentaire
                $signaler = 'non';
                $req = $db->prepare('INSERT INTO commentaire (id_page,auteur,message,signaler) VALUES (?,?,?,?)');
                $req->execute(array($_GET['chapitre'],$_POST['pseudo'],$_POST['commentaire'],$signaler));
                ?>
                    <pre>
                            <?php var_dump($signaler); ?>
                    </pre>
                <?php
            } 
            $req->CloseCursor();
            ?>
        </form>
        <?php
            //recupération des commentaire
            $req = $db->prepare('SELECT id,auteur,message,DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM commentaire  WHERE id_page = ? ORDER BY id DESC');
            $req->execute(array($_GET['chapitre']));
            while($donnees = $req->fetch())
            {
                ?>  
                    <div id = "commentaire_<?php echo $donnees['id'];?>">
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
                                <td>
                                    <button><a href = "signaler.php?commentaire=<?php echo $donnees['id'] ?>">signaler</button>
                                </td>
                            </tr>
                        </table>
                    </div>    
                <?php

            }
            ?>
        
    </body>
</html>