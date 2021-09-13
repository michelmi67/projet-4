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
    <body class = "chapitre">
        <!--Inclusion du header -->
        <?php include('header.php'); ?>
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
            $req_2 =  $db->prepare('SELECT count(*) as total from chapitre');
            $req_2->execute();
            $count = (int)$req_2->fetchColumn();
            $req_2->CloseCursor();
            ?>
            
            <div class = "suivant_precedent">
                <?php 
                if($page_courante > 1){
                    ?>
                    <a href = "chapitre.php?chapitre=<?php echo $donnees['id']-1; ?>" class = "button">précédent</a>
                    <?php
                }
                if($page_courante != $count){
                    ?>
                    <a href = "chapitre.php?chapitre=<?php echo $donnees['id']+1; ?>" class = "button">suivant</a>
                    <?php
                }
                ?>
            </div>
        
        <h2>Commentaires</h2>
        <form method = "post" action = "chapitre.php?chapitre=<?php echo $donnees['id']?>">
            <input type = "text" name = "pseudo" id = "pseudo" placeholder = "Pseudo" required/><br><br>
            <textarea name = "commentaire" id = "commentaire" placeholder = "Votre commentaire" rows = "6" cols = "75" required ></textarea><br><br>
            <input type = "submit" value = "envoyé"/>
            <?php 
            if($_POST)
            {
                //Envoi d'un commentaire
                $signaler = "false";
                $moderer = "false"; 
                $req = $db->prepare('INSERT INTO commentaire (id_page,auteur,message,signaler,moderer) VALUES (?,?,?,?,?)');
                $req->execute(array($_GET['chapitre'],$_POST['pseudo'],$_POST['commentaire'],$signaler,$moderer));
            } 
            $req->CloseCursor();
            ?>
        </form>
        <?php
            //recupération des commentaire
            $req = $db->prepare('SELECT id,auteur,message,moderer,DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM commentaire  WHERE id_page = ? ORDER BY id DESC');
            $req->execute(array($_GET['chapitre']));
            while($donnees = $req->fetch())
            {
                //si le commenatire n'est pas modéré
                if($donnees['moderer'] == "false")
                {
                    ?>  
                    <div id = "commentaire_<?php echo $donnees['id'];?>">
                        <table>
                            <tr>
                                <td>
                                    <strong> Le <?php echo htmlspecialchars($donnees['date_creation_fr']), " par " , htmlspecialchars($donnees['auteur']);  ?> :</strong> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo htmlspecialchars($donnees['message']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href = "signaler.php?commentaire=<?php echo $donnees['id'] ?>" class = "button">signaler</a>
                                </td>
                            </tr>
                        </table>
                    </div>    
                <?php
            }
            // Si le message est modéré
            if($donnees['moderer'] == 'true')
            {
                ?>  
                <div id = "commentaire_<?php echo $donnees['id'];?>">
                    <table>
                        <tr>
                            <td>
                                <strong> Le <?php echo htmlspecialchars($donnees['date_creation_fr']), " par " , htmlspecialchars($donnees['auteur']);  ?> :</strong> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Message modéré !</p>
                            </td>
                        </tr>
                    </table>
                </div>    
                <?php
            }
        }
        ?>
        <!--Inclusion du footer -->
        <?php include('footer.php') ?>
        <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>