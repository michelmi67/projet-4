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
        
    </head>
    <header>
    <!--Inclusion du header -->
    <?php include('header.php'); ?>
    <body class = "index_chapitre">
        <h1>Bienvenue sur le blog de Jean Forteroche !</h1>
        <h3>acteur et écrivain</h3>
        <?php 
            //connexion à la base de données
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root','');
            }
            catch(Exeption $e)
            {
                die('Erreur :' .$e->getMessage);
            }

            
            //Chapitre
            $req = $db->query('SELECT id,titre,article,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM chapitre ORDER BY id  ');
            while($donnees = $req->fetch())
            {
                $article = strip_tags($donnees['article']);
                ?> 
                <table>
                    <tbody>
                        <tr>
                            <td id = "td_titre">
                                <?php echo $donnees['titre'];?> 
                        </td>
                        </tr>
                        <tr>
                            <td class = "article_<?php echo $donnees['id'] ?>">
                                <?php echo substr($article,0,1000);?></br>
                                <p><a href = "chapitre.php?chapitre=<?php echo $donnees['id'] ?>" > lire la suite...</a></p>
                            </td>
                                                
                        </tr>            
                    </tbody>
                </table>
                <?php
            }
        ?>
    </body>
</html>