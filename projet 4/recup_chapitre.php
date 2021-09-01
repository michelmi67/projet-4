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
        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/2e63600e57.js" crossorigin="anonymous"></script>
    </head>
    <header>
        <div class = "connection">
            <button><a href = connection.php>Connection admin</a></button>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <button><a href = "interface.php">Interface</a></button>
                <?php
            }
            ?>
        </div>
        <div class = "chapitre">
            <button><a href = index.php>Accueil</a></button>
            <button><a href = chapitre.php>Chapitres</a></button>
        </div>
    </header>
    <body class = "recup_chapitre">
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
            ?>
            <table>
                <tbody>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Titre</td>
                            <td>Chapitre</td>
                            <td>Action</td>
                        </tr>
                    </thead>
        <?php        
        //Chapitre
        $req = $db->query('SELECT id,titre,article, DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM chapitre ORDER BY date_creation ');
        while($donnees = $req->fetch())
        {

            //instanciation des variables
            $titre = strip_tags($donnees['titre']);
            $article = strip_tags($donnees['article']);
            ?> 
                <tr>
                    <td><?php echo $donnees['id']; ?></td>
                    <td id = "td_titre"><?php echo substr($titre,0,50);?></td> 
                    <td><?php echo substr($article,0,100);?></td>
                    <div class = "action"> 
                        <td>
                            <a href = "commentaire.php?chapitre= <?php echo $donnees['id']; ?>"><i class="far fa-eye"></i></a>
                            <a href = "modif_chapitre.php?chapitre= <?php echo $donnees['id']; ?>"><i class="fas fa-pen"></i></a>
                            <a href = "suprime_chapitre.php?chapitre= <?php echo $donnees['id']; ?>"><i class="far fa-trash-alt"></a></i>
                        </td>
                    </div>
                </tr> 
                <?php            
            }
            ?>
            </tbody>
        </table>
    </body>
</html>